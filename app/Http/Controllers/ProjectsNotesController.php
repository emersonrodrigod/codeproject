<?php

namespace CodeProject\Http\Controllers;

use Illuminate\Http\Request;
use CodeProject\Http\Controllers\Controller;
use CodeProject\Repositories\ProjectNoteRepository;
use CodeProject\Services\ProjectNoteService;

class ProjectsNotesController extends Controller {

    /**
     * @var ClientRepository
     */
    private $repository;
    private $service;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index($id) {
        return $this->repository->findWhere(['project_id' => $id]);
    }

    public function store(Request $request) {
        return $this->service->create($request->all());
    }

    public function show($id, $noteId) {
        return $this->repository->findWhere(['project_id' => $id, 'id' => $noteId]);
    }

    public function destroy($id, $noteId) {
        $this->repository->find($noteId)->delete();
    }

    public function update(Request $request, $id, $noteId) {
        $this->repository->update($request->all(), $noteId);
    }

}
