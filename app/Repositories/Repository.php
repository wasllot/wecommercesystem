<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

abstract class Repository implements RepositoryInterface
{

    /**
     * @var App
     */
    private $app;

    /**
     * @var
     */
    protected $model;

    /**
     * The relations to eager load.
     *
     * @var
     */
    protected $with = [];

    /**
     * @param App $app
     *
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract public function model();

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function find($value)
    {
        return $this->model->findOrFail($value);
    }

    /**
     * @param $attribute
     * @param $value
     * @return mixed
     */
    public function findBy($attribute, $value)
    {
        return $this->model->where($attribute, $value)->first();
    }

    /**
     * @param $value
     * @return mixed
     */
    public function findOrFail($value)
    {
        return $this->model->findOrFail($value)->first();
    }

    /**
     * Get table name
     * @return string
     */
    public function getTableName()
    {
        return $this->model->getTable();
    }

    /**
     * @param $attribute
     * @param $value
     * @return mixed
     */
    public function whereIn($attribute, $value = array())
    {
        return $this->model->whereIn($attribute, $value)->first();
    }

    /**
     * @param $attribute
     * @param $value
     * @return mixed
     */
    public function where($attribute, $value)
    {
        return $this->model->where($attribute, $value)->get();
    }

    /**
     * Sets relations for eager loading.
     *
     * @param $relations
     * @return $this
     */
    public function with($relations)
    {
        if (is_string($relations)) {
            $this->with = explode(',', $relations);
            return $this->model->with($this->with);
        }
        $this->with = is_array($relations) ? $relations : [];
        return $this;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @return Model
     */
    protected function makeModel()
    {
        $model = $this->app->make($this->model());
        return $this->model = $model;
    }
}