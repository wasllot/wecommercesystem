<?php

namespace App\Repositories;

class PaymentRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Payment';
    }
}