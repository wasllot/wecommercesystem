<?php

namespace App\Repositories;

class SettingRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Setting';
    }
}