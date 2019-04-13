<?php

namespace App\Repositories;

class BrandRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Brand';
    }

    /**
     * Get data and count items for filters page.
     * @param $parent
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function withCount($parent)
    {
        return $this->model->with(['brandCount' => function ($q) use ($parent) {
            $q->where('parent_id', $parent);
        }])->get();
        $this->model->first()->brandCount;
    }
}