<?php

namespace App\Repositories;

class ColorRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Color';
    }

    /**
     * Get data and count items for filters page.
     * @param $parents
     * @return mixed
     */
    public function withCount($parents)
    {
        return $this->model->with(['colorCount' => function ($q) use ($parents) {
            $q->whereIn('product_id', $parents);
        }])->get();
        $this->model->first()->colorCount;
    }
}