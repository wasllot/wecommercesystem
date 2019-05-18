<div class="container clearfix">
    <div class="clear"></div>
    <ul class="secondary_menu">
        @admin
            <li><a href="{{ url('backend/orders') }}">@lang('site.admin panel')</a></li>
            @include('frontend.logout')
        @endadmin
        @user
            <li><a href="{{ url('backend/user-orders') }}">@lang('site.user panel')</a></li>
            @include('frontend.logout')
        @enduser
        @guest
            <li><a href="{{url('login')}}">@lang('site.my account')</a></li>
            <li><a href="{{ url('auth/register') }}">@lang('site.register')</a></li>
        @endguest

    </ul>
</div>

