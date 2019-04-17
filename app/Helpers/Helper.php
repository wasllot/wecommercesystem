<?php

namespace App\Helpers;

use App\Models\Currency;

class Helper
{

    /**
     * @param $input
     * @return mixed
     */
    public static function price($input)
    {
    
        $var = session('currency');

        if (isset($var)) {

            $currency = Currency::where('name', '=', $var)->first();
            $rate = $currency->rate;

        } else {

            $rate = 1;
        }

        $total = (double)$input * (double)$rate;
        
        return number_format((double)$total, 2);
    }

    /**
     * @param $path
     * @param string $active
     * @return string
     */
    public static function setActive($path, $active = 'active')
    {
        return request()->segment(2) === $path ? $active : '';
    }
}