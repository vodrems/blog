<?php

namespace App\Repositories;


use App\Http\Requests\SaveTask;

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
}