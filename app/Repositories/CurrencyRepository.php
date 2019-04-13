<?php

namespace App\Repositories;

class CurrencyRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Currency';
    }
}