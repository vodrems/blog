<?php

namespace App\Repositories;

use App\Task;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface {

    /**
     * Set model
     *
     * @return string
     */
    public function model() {
        return Task::class;
    }
}