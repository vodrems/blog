<?php

namespace App\Repositories;


use App\Http\Requests\SaveTask;
use App\Task;
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
}