<!-- CLEARFIX -->
<div class="clearfix padbot40">
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="tovar_view_fotos clearfix">
                <div id="slider2" class="flexslider">
                    <ul class="slides">
                        <li><a><img src="{{ url('images/products') }}/{{$item->a_img}}" alt=""/></a></li>
                        <li><a><img src="{{ url('images/products') }}/{{$item->b_img}}" alt=""/></a></li>
                        <li><a><img src="{{ url('images/products') }}/{{$item->c_img}}" alt=""/></a></li>
                    </ul>
                </div>
                <div id="carousel2" class="flexslider">
                    <ul class="slides">
                        <li><a href="javascript:void(0);">
                                <img src="{{ url('images/products') }}/{{$item->a_img}}" alt=""/></a></li>
                        <li><a href="javascript:void(0);">
                                <img src="{{ url('images/products') }}/{{$item->b_img}}" alt=""/></a></li>
                        <li><a href="javascript:void(0);">
                                <img src="{{ url('images/products') }}/{{$item->c_img}}" alt=""/></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="tovar_view_description px-2">
                <div class="tovar_view_title">{{$item->name}}</div>
                <div class="clearfix tovar_brend_price">
                    <div class="pull-left tovar_brend">{{$item->brand}}</div>
                    <div class="pull-right tovar_view_price">
                        {!! Helper::price($item->price) !!}&nbsp BsS
                    </div>
                </div>

                <div class="tovar-color-select">
                    <h4>Califica el producto</h4>
                    <div class="pb-4 float-center">
                        <star-rating :rating="4.67" :round-start-rating="false"></star-rating>
                        
                    </div>
                </div>
                <div class="tovar_view_btn">
                    {!! Form::open(['url' => 'cart/store']) !!}

                    <input type="text" name="qty" value="QTY" id=""
                           maxlength="3" size="50" style="width: 20%"
                           onFocus="if (this.value == 'QTY') this.value = '';"
                           onBlur="if (this.value == '') this.value = 'QTY';"/>

                    <div class="tovar_view_btn">
                        @include('errors.error_layout')
                        @admin
                            <a class="add_bag" href="{{ url('backend/products') }}"><i class="fa fa-pencil-square-o"></i></a>
                        @endadmin
                        @guest
                            <a class="add_bag" href="{{ url('login') }}">
                                <i class="fa fa-shopping-cart"></i>@Añadir al carrito</a>
                        @endguest
                        @user
                            {!! Form::hidden('id', $item->id) !!}
                            {!! Form::hidden('name', $item->name) !!}
                            {!! Form::hidden('price', $item->price) !!}
                            {!! Form::hidden('img', $item->a_img) !!}
                            {!! Form::submit('Add to bag', ['class' => 'add_bag']) !!}
                            {!! Form::close() !!}
                        @enduser
                    </div>
                </div>

            </div>
        </div>
    </div>



</div>
<!-- //CLEARFIX -->