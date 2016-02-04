<?php

namespace CodeProject\Http\Middleware;

use Closure;
use CodeProject\Repositories\ProjectRepository;

class CheckProjectOwner
{

    /**
     * @var ProjectRepository
     */
    private $repository;

    public function __construct(ProjectRepository $repository)
    {

        $this->repository = $repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $userId = \Authorizer::getResourceOwnerId();
        $projectId = $request->projects;
        if ($this->repository->isOwner($projectId, $userId) == false) {
            return ['error' => 'Access denied! You must be the project owner to access this resource'];
        }

        return $next($request);
    }

}
