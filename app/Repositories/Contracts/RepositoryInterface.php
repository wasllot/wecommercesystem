<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $value
     * @return mixed
     */
    public function find($value);

    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    public function findBy($field, $value);

    /**
     * @param $value
     * @return mixed
     */
    public function findOrFail($value);

    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    public function whereIn($field, $value = array());

    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    public function where($field, $value);

    /**
     * @param $relation
     * @return mixed
     */
    public function with($relation);
}