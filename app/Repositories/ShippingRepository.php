<?php

namespace App\Repositories;

class ShippingRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Shipping';
    }
}