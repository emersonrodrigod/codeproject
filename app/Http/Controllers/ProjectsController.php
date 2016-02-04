<?php

namespace CodeProject\Http\Controllers;

use Illuminate\Http\Request;
use CodeProject\Http\Controllers\Controller;
use CodeProject\Repositories\ProjectRepository;
use CodeProject\Services\ProjectService;

class ProjectsController extends Controller {

    /**
     * @var ClientRepository
     */
    private $repository;
    private $service;
    private $userId;

    public function __construct(ProjectRepository $repository, ProjectService $service) {
        $this->repository = $repository;
        $this->service = $service;
        $this->userId = \Authorizer::getResourceOwnerId();
    }

    public function index() {
        return $this->repository->findWhere(['owner_id' => $this->userId]);
    }

    public function store(Request $request) {
        return $this->service->create($request->all());
    }

    public function show($id) {
        if ($this->checkProjectPermissios($id) == false) {
            return ['error' => 'Access Denied! You must be the project owner or project member to access this resource'];
        }
        return $this->repository->find($id);
    }

    public function destroy($id) {
        $this->repository->find($id)->delete();
    }

    public function update(Request $request, $id) {
        $this->service->update($request->all(), $id);
    }

    private function checkProjectOwner($projectId) {
        $userId = \Authorizer::getResourceOwnerId();
        return $this->repository->isOwner($projectId, $userId);
    }

    private function checkProjectMember($projectId) {
        $userId = \Authorizer::getResourceOwnerId();
        return $this->repository->isMember($projectId, $userId);
    }

    private function checkProjectPermissios($projectId) {
        if ($this->checkProjectOwner($projectId) or $this->checkProjectMember($projectId)) {
            return true;
        }

        return false;
    }

}
