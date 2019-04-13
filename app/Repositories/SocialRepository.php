<?php

namespace App\Repositories;

class SocialRepository extends Repository
{

    /**
     * Social Login.
     * @return mixed
     */

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\Models\Social_Account';
    }
}