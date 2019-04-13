<?php

namespace App\Repositories;

class CountryRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Country';
    }
}