<?php

namespace App\Repositories;

class SizeRepository extends Repository
{
    /**
     * Get data and count items for filters page.
     * @return mixed
     */

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Size';
    }

    /**
     * Get data and count items for filters page.
     * @param $parents
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function withCount($parents)
    {
        return $this->model->with(['sizeCount' => function ($q) use ($parents) {
            $q->whereIn('product_id', $parents);
        }])->get();
        $this->model->first()->sizeCount;
    }
}