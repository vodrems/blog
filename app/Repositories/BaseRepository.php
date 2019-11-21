<?php

namespace App\Repositories;

use Illuminate\Container\Container as Application;

abstract class BaseRepository implements BaseRepositoryInterface {

    /**
     * @var model
     */
    protected $model;

    /**
     * @var Application
     */
    protected $app;

    /**
     * BaseRepository constructor.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * @return mixed
     */
    abstract public function model();

    /**
     * Show all
     *
     * @return mixed
     */

    public function all()
    {
        return $this->model->orderBy('created_at', 'desc')->get();;
    }

    /**
     * Store
     *
     * @param array $data
     *
     * @return mixed
     */
    public function store(array $data)
    {
        $this->model->create($data);
    }

    /**
     * Create model from name model
     */
    public function makeModel()
    {
        $this->model = $this->app->make($this->model());
    }

    /**
     * Show on id
     *
     * @param int $id
     *
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Update
     *
     * @param int $id
     * @param array $newData
     *
     * @return mixed
     */
    public function update(int $id, array $newData)
    {
        $model = $this->model->findOrFail($id);

        return $model->update($newData);
    }

    /**
     * Delete on id
     *
     * @param int $id
     *
     * @return mixed
     */
    public function delete(int $id)
    {
        $model = $this->model->findOrFail($id);

        return $model->delete();
    }

}