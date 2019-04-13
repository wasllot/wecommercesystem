<div class="billing_information">
    <p class="checkout_title margbot10">@lang('site.billing information')</p>

    <div class="billing_information_content margbot40">
        <span>{{$customer['name']}}</span>
        <span>{{$customer['adress']}}</span>
        <span>{{$customer['city']}}</span>
        <span>{{$customer['country']}}</span>
        <span>{{$customer['email']}}</span>
    </div>
    <p class="checkout_title margbot10">@lang('site.shipping address')</p>

    <div class="billing_information_content margbot40">
        <span>{{$customer['name']}}</span>
        <span>{{$customer['adress']}}</span>
        <span>{{$customer['city']}}</span>
        <span>{{$customer['country']}}</span>
        <span>{{$customer['email']}}</span>
    </div>
</div>