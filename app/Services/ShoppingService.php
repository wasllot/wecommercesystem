<?php

namespace App\Services;

use Carbon\Carbon;
use App\Events\AddCustomer;
use App\Events\ForgetSession;
use App\Repositories\OrderRepository;
use App\Repositories\TaxRepository;;

class ShoppingService
{
   

    protected  $order;

    protected $tax;

    /**
     * ShoppingService constructor.
     * @param OrderRepository $order
     * @param TaxRepository $tax
     */
    public function __construct(OrderRepository $order, TaxRepository $tax)
    {
        $this->order = $order;
        $this->tax = $tax;
    }

    /**
     * @param $request
     * @return bool
     */
    public function checkDiscount()
    {
        $codes = $this->tax->all();
        foreach ($codes as $code) {
            if (is_null(request()->has('discount')) && request()->input('discount') !== $code->code) {
                //dd(request()->all());
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * @param $request
     * @param $cart
     */
    public function createOrder($cart)
    {
        $request = request();
        $user = session()->all();
        $user['user_id'] = auth()->user()->id;
        $this->makeOrder($cart);
        event(new AddCustomer($user));
        event(new ForgetSession($request));
    }

    /**
     * @param $cart
     * @return mixed
     */
    public function makeOrder($cart)
    {
        foreach ($cart as $item) {
            $this->order->create([
                'user_id' => auth()->user()->id,
                'order_date' => Carbon::now(),
                'product_id' => $item->id,
                'quantity' => $item->qty,
                'amount' => $item->subtotal,
                'size' => '',
                'img' => $item->options->img,
                'color' => '',
            ]);
        }
    }

    /**
     * @param $request
     * @return mixed
     */
    public function prepareStore()
    {
        $code = $this->tax->findBy('code', request()->input('discount'));
        isset($code) ? $discount = $code->discount : $discount = 0;
        $productPrice = request()->input('price');
        $price = ((100 - $discount) / 100) * $productPrice;
        $data = request()->except(['_token', 'discount', 'price', 'color', 'size', 'img']);
        $data['price'] = $price;
        $data['options'] = request()->except(['_token', 'id', 'name', 'qty', 'price']);
        return $data;
    }

}