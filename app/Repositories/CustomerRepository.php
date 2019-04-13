<?php

namespace App\Repositories;

class CustomerRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Customer';
    }
}