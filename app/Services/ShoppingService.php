<?php

namespace App\Services;

use Carbon\Carbon;
use App\Events\AddCustomer;
use App\Events\ForgetSession;
use App\Repositories\OrderRepository;
use App\Repositories\TaxRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ShippingRepository;
use App\Repositories\OrderDetailsRepository;
use App\Models\Order;
use App\Models\Order_details;
use Chat;
use Illuminate\Support\Facades\DB;


class ShoppingService
{
   

    protected  $order;

    protected $tax;

    protected $payment;

    protected $shipping;

    protected $details;

    /**
     * ShoppingService constructor.
     * @param OrderRepository $order
     * @param TaxRepository $tax
     */
    public function __construct(OrderRepository $order, TaxRepository $tax, PaymentRepository $payment, ShippingRepository $shipping, OrderDetailsRepository $details)
    {
        $this->order = $order;
        $this->tax = $tax;
        $this->payment = $payment;
        $this->shipping = $shipping;
        $this->details = $details;
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
        error_log($request);
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

        $customer = session()->all();

        $participants = [auth()->user()->id];

        $users = DB::table('role_user')->where('role_id', 1)->get(); 

        foreach ($users as $user) {
            
            array_push($participants, $user->user_id); 
        }


        foreach ($cart as $item) {
            $order = $this->order->create([
                'user_id' => auth()->user()->id,
                'order_date' => Carbon::now(),
                'product_id' => $item->id,
                'quantity' => $item->qty,
                'amount' => $item->total,
                'payment_id' => $this->payment->find(session()->get('payment'))->id,
                'img' => $item->options->img,
                'shipping_id' => $this->shipping->find(session()->get('delivery'))->id,
            ]);

            $conversation = Chat::createConversation($participants, $item->name);


            $this->makeDetails($customer, $order->id, $conversation->id);
        }
    }

    public function makeDetails($customer, $orderId, $conversationId){

        $this->details->create([
            'name'=> $customer['name'],
            'address' => $customer['adress'],
            'city'=> $customer['city'],
            'state'=>$customer['country'],
            'email' => $customer['email'],
            'order_id' => $orderId,
            'conversation_id' => $conversationId
        ]);

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
        $data = request()->except(['_token', 'discount', 'price', 'payment_id', 'shipping_id', 'img']);
        $data['price'] = $price;
        $data['options'] = request()->except(['_token', 'id', 'name', 'qty', 'price']);
        return $data;
    }

}