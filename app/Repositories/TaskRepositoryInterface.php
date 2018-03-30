<?php

namespace App\Repositories;


use App\Http\Requests\SaveTask;
use App\Task;

interface TaskRepositoryInterface {
    /**
     * Show all tasks
     *
     * @return mixed
     */
    public function all();

    /**
     * Store task
     *
     * @param array $data
     *
     * @return mixed
     */
    public function store(array $data);

    /**
     * Show task on id
     *
     * @param int $id
     *
     * @return mixed
     */
    public function find(int $id);

    /**
     * Update task
     *
     * @param Task $task
     * @param array $newTaskData
     *
     * @return mixed
     */
    public function update(Task $task, array $newTaskData);
}