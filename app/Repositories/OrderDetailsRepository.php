<?php

namespace App\Repositories;

class OrderDetailsRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Order_details';
    }
}