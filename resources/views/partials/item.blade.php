<!-- TOVAR -->
@foreach($products as $row)
    <div class="col-lg-3 col-md-3 col-6 padbot40">
        <div class="tovar_item">
            <div class="tovar_img">
                <div class="tovar_img_wrapper">
                    <img class="img" src="{{$row->a_img}}" alt=""/>
                    <img class="img_h fancybox fancybox.ajax img-fluid" href="{{ url('frame') }}/{{$row->id}}"
                         src="{{$row->b_img}}" alt=""/>
                </div>
                <div class="tovar_item_btns d-flex mx-2">
                    <a class="open-project tovar_view"
                       href="{{ url('/') }}/{{$row->category->cat}}/{{$row->slug}}/{{$row->id}}">
                        <span>@lang('site.product view')</span></a>
                    @user
                    <a class="add_bag"
                       href="{{ url('/') }}/{{$row->category->cat}}/{{$row->slug}}/{{$row->id}}">
                        <i class="fa fa-shopping-cart"></i></a>
                    @enduser
                    @guest
                        <a class="add_bag" href="{{ url('login') }}"><i class="fa fa-shopping-cart"></i></a>
                    @endguest
                    @admin
                        <a class="add_bag" href="{{ url('backend/products') }}"><i class="fa fa-pencil-square-o"></i></a>
                    @endadmin
                </div>
            </div>
            <div class="tovar_description clearfix">
                <a class="tovar_title"
                   href="{{ url('/') }}/{{$row->category->cat}}/{{$row->slug}}/{{$row->id}}">{{$row->name}}</a>
                <span class="tovar_price">{!! Helper::price($row->price) !!}&nbspBsS</span>
            </div>
        </div>
    </div>
@endforeach
<!-- //TOVAR -->