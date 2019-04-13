<?php

namespace App\Repositories;

class OrderRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Order';
    }
}