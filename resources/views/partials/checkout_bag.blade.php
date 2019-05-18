<div class="sidepanel widget_bag_totals your_order_block">
    <h3>@lang('site.your order')</h3>
    <table class="bag_total">
        <tr class="shipping clearfix">
            <th>@lang('site.products')</th>
            <td>{!! Helper::price($grand_total) !!}&nbsp Bs.</td>
        </tr>
        <tr class="shipping clearfix">
            <th>@lang('site.shipping')</th>
            <td>{!! Helper::price($shippings->rate) !!}&nbsp Bs.</td>
        </tr>
        <tr class="total clearfix">
            <th>Total</th>
            <td>{!! Helper::price($finalTotal) !!}&nbsp Bs.</td>
        </tr>
    </table>
    <a class="btn active" href="{{ url('checkout/create') }}">@lang('site.finish')</a>
    <!-- <a class="btn active" href="{{ url('payment/alert') }}">Proceed to PayPal</a> -->
    <a class="btn inactive" href="{{ url(URL::previous()) }}">@lang('site.go to previous step')</a>
</div>