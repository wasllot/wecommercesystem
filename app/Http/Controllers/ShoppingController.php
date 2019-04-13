<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use App\Http\Requests\SubmitProduct;
use App\Http\Requests\SubmitCheckout;
use App\Services\ShoppingService;
use Chat;


class ShoppingController extends Controller
{

    protected $cart;

    protected $shopping;

    public function __construct(ShoppingService $shoppingService, Cart $cart)
    {
        $this->cart = $cart;
        $this->shopping = $shoppingService;
    }

    /**
     * Show shopping cart to user.
     * @return View
     */
    public function index()
    {
        return view('frontend/shopping_cart');
    }

    /**
     * Store customer data to Session.
     * @param Request $request
     * @return View
     */
    public function customerStore(SubmitCheckout $request)
    {
        $input = request()->all();
        session()->put($input);
        return redirect('checkout/show');
    }


    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createOrder()
    {
        $cart = $this->cart->instance(auth()->id())->content();
        if (!session()->has('email')) {
            session()->flash('flash_message', 'YOUR MUST FILL REQUIRED FIELDS!');
            return redirect('checkout/shipping');
        } elseif ($cart->isEmpty()) {
            session()->flash('flash_message', 'YOU MUST SELECT PRODUCT!');
            return redirect()->back();
        }
        $this->shopping->createOrder($cart);

        $participants = [auth()->user()->id];

        foreach ($cart as $c) {

            $conversation = Chat::createConversation($participants, $c->name);

        }

        $this->cart->instance(auth()->id())->destroy();
        return redirect('checkout/order');
    }


    /**
     * Add a row to the cart
     * @param SubmitProduct $request *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeItem(SubmitProduct $request)
    {
        if ($this->shopping->checkDiscount()) {
            session()->flash('flash_message', 'You are entered invalid discount code!');
            return redirect()->back();
        }
        $data = $this->shopping->prepareStore();
        //make new instance of the Cart for every user.
        //active instance of the cart is curent instance.
        $this->cart->instance(auth()->id())->add($data);
        return redirect('cart');
    }


    /**
     * Update products in shopping cart.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateItem()
    {
        $content = request()->input('qty');
        foreach ($content as $id => $row) {
            $this->cart->instance(auth()->id())
                ->update($row['rowId'], $row['qty']);
        }
        return redirect('cart');
    }

    /**
     * Remove product from shopping cart.
     * @param $rowId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeItem($rowId)
    {
        $this->cart->instance(auth()->id())->remove($rowId);
        return redirect('cart');
    }

    /**
     * Clear shopping cart.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete()
    {
        $this->cart->instance(auth()->id())->destroy();
        return redirect('cart');
    }

    /**
     * Show user confirmation for finalazing order.
     * @return View
     */
    public function finalOrder()
    {
        session()->flash('flash_message', '¡Su orden ha sido satiscantoriamente realizada!');
        return view('frontend.placeOrder');
    }
}