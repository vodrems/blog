<?php

namespace App\Repositories;

interface BaseRepositoryInterface {
    /**
     * Show all
     *
     * @return mixed
     */
    public function all();

    /**
     * Store
     *
     * @param array $data
     *
     * @return mixed
     */
    public function store(array $data);

    /**
     * Show on id
     *
     * @param int $id
     *
     * @return mixed
     */
    public function find(int $id);

    /**
     * Update
     *
     * @param int $id
     * @param array $newData
     *
     * @return mixed
     */
    public function update(int $id, array $newData);
}