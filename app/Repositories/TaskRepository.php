<?php

namespace App\Repositories;


use App\Http\Requests\SaveTask;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskRepository implements TaskRepositoryInterface {

    /**
     * Show all tasks
     *
     * @return mixed
     */
    public function all()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();

        return $tasks;
    }

    /**
     * Store task
     *
     * @param array $data
     *
     * @return mixed
     */
    public function store(array $data) {
        Auth::user()->tasks()->create($data);
    }

    /**
     * Show task on id
     *
     * @param int $id
     *
     * @return mixed
     */
    public function find(int $id) {
        $task = Task::findOrFail($id);

        return $task;
    }

    /**
     * Update task
     *
     * @param Task $task
     * @param array $newTaskData
     *
     * @return mixed
     */
    public function update(Task $task, array $newTaskData) {
        return $task->update($newTaskData);
    }
}