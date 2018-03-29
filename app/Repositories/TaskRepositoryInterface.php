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

    /**
     * Show task on id
     *
     * @param int $id
     *
     * @return mixed
     */
    public function find(int $id);
}