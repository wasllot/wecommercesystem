<?php

namespace App\Services;

use App\Repositories\CountryRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ShippingRepository;

class CheckoutService extends BaseService
{

    public function __construct
    (
        CountryRepository $country,
        PaymentRepository $payment,
        ShippingRepository $shipping

    )
    {
        $this->country = $country;
        $this->payment = $payment;
        $this->shipping = $shipping;
    }

    /**
     * Prepare data to checkout page
     * @return mixed
     */
    public function checkoutData()
    {
        $data['countries'] = $this->country->all();
        $data['payments'] = $this->payment->all();
        $data['shippings'] = $this->shipping->all();
        return $data;
    }

    /**
     * Show order information and final cost from session.
     * @return mixed
     */
    public function checkoutShow()
    {
        $cart = $this->setCart();
        $data['cartTotal'] = $cart['grandTotal'];
        $data['payments'] = $this->payment->find(session()->get('payment'));
        $data['shippings'] = $this->shipping->find(session()->get('delivery'));
        $data['customer'] = session()->all();
        $data['vat_total'] = $this->vat();
        $data['finalTotal'] = $cart['grandTotal'] + $data['shippings']->rate;
        // $data['finalTotal'] = $cart['grandTotal'] + $data['shippings']->rate + $data['vat_total'];
        return $data;
    }

    /**
     * @return mixed
     */
    public function vat()
    {
        $cart = $this->setCart();
        $vat = $this->country->findBy('name', session()->get('country'));
        $vat_total = $cart['grandTotal'] * $vat->vat;
        return $vat_total;
    }
}