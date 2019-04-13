<?php

namespace App\Services;

use App\Models\Currency;
use App\Models\Setting;
use Gloudemans\Shoppingcart\Facades\Cart;

trait Settings
{

    /**
     * Set global variables for all templates.
     * @return mixed
     */
    public function setVars ()
    {
        $data['header'] = Setting::findOrFail(1);
        $data['locale'] = app()->getLocale();
        $data['currency'] = Currency::all();
        return $data;
    }

    /**
     * Set shopping cart
     * @return mixed
     */
    public function setCart()
    {
        if (!auth()->check()) {
            $data['rows'] = null;
            $data['cart'] = null;
            $data['grandTotal'] = null;
        } else {
            $data['rows'] = Cart::instance(auth()->id())
                ->content()
                ->count(false);
            $data['cart'] = Cart::instance(auth()->id())
                ->content();
            $data['grandTotal'] = Cart::instance(auth()->id())
                ->total();
        }
        return $data;
    }

}