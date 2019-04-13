<?php

namespace App\Repositories;

class CategoryRepository extends Repository
{
    
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Category';
    }
}