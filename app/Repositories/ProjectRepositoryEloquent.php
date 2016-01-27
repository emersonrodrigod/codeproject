<?php

namespace CodeProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\Project;

/**
 * Description of ClientRepositoryEloquent
 *
 * @author ti
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository {

    public function model() {
        return Project::class;
    }

}
