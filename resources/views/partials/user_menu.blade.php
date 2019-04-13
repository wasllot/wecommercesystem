<div class="container clearfix">
    <div class="clear"></div>
    <ul class="secondary_menu">
        @admin
            <li><a href="{{ url('backend/admin') }}">@lang('site.admin panel')</a></li>
            @include('frontend.logout')
        @endadmin
        @user
            <li><a href="{{ url('backend/user') }}">@lang('site.user panel')</a></li>
            @include('frontend.logout')
        @enduser
        @guest
            <li><a href="{{url('login')}}">@lang('site.my account')</a></li>
            <li><a href="{{ url('auth/register') }}">@lang('site.register')</a></li>
        @endguest
           <li class="search_form ">
                <input type="text" class="form-control" name="search" id="search_auto" placeholder="Search..." >
            </li>

    </ul>
</div>