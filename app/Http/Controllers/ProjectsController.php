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

    public function __construct(ProjectRepository $repository, ProjectService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index() {
        return $this->repository->all();
    }

    public function store(Request $request) {
        return $this->service->create($request->all());
    }

    public function show($id) {
        return $this->repository->find($id);
    }

    public function destroy($id) {
        $this->repository->find($id)->delete();
    }

    public function update(Request $request, $id) {
        $this->service->update($request->all(), $id);
    }

}
