<?php

namespace App\Repositories;

class TaxRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Tax';
    }
}