<?php

namespace App\Repositories;


class ModelFactory
{

     /**
     * @param $model
     * @return model instance.
     */
    public static function all($model)
    {
        //Use this if you move Factory to Models namespace.
        //$classname = __NAMESPACE__ . '\\' . $model;
        //return \App::make($classname)->all();
        return \App::make('App\Models'. '\\' .$model)->all();
    }

    /**
     * @param $model
     * @param $id
     * @return mixed
     */
    public static function find($model,$id)
    {
        return \App::make('App\Models'. '\\' .$model)->findOrFail($id);
    }

    /**
     * @param $model
     * @param array $data
     * @return mixed
     */
    public static function create($model,array $data)
    {
        return \App::make('App\Models'. '\\' .$model)->create($data);
    }

    /**
     * @param $model
     * @param $column
     * @param $attribute
     * @return mixed
     */
    public static function where($model,$column,$attribute)
    {
        return \App::make('App\Models'. '\\' .$model)->where($column,$attribute)->first();
    }

    /**
     * @param $model
     * @param $column
     * @param $attribute
     * @return mixed
     */
    public static function whereIn($model,$column,$attribute)
    {
        return \App::make('App\Models'. '\\' .$model)->whereIn($column,$attribute)->first();
    }
}