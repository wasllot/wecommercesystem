@extends('frontend.master')
@section('content')
    <!-- BREADCRUMBS -->
    <section class="breadcrumb parallax margbot30"></section>
    <!-- //BREADCRUMBS -->


    <!-- TOVAR DETAILS -->
    <section class="tovar_details" id="app">

        <!-- CONTAINER -->
        <div class="container-fluid">

            <!-- ROW -->
            <div class="row">

                <!-- SIDEBAR TOVAR DETAILS -->
                <div class="col-lg-3 col-md-2 sidebar_tovar_details">
                    <h3>
                        <b>@lang('site.other')</b>
                    </h3>
                    <ul class="tovar_items_small clearfix">
                        @foreach($products as $row)
                            <li class="clearfix">
                                <img class="tovar_item_small_img"
                                     src="{{ url('images/products') }}/{{$row->a_img}}" alt=""/>
                                <a href="{{ url('/') }}/{{$row->category->cat}}/{{$row->slug}}/{{$row->id}}"
                                   class="tovar_item_small_title"><?php echo $row->name;?></a>
                                <span class="tovar_item_small_price">
                                {!! Helper::price($row->price) !!}&nbsp BsS
                            </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- //SIDEBAR TOVAR DETAILS -->

                <!-- TOVAR DETAILS WRAPPER -->
                <div class="col-lg-9 col-md-10 col-12 tovar_details_wrapper clearfix">
                    <div class="tovar_details_header clearfix margbot35">
                        <h3 class="pull-left">
                            <b>
                                <a href="{{ url('catalog') }}/{{$item->category->cat}}/{{$item->parent_id}}?categ={{$item->cat_id}}">{{$item->category->cat}}</a>
                            </b>
                        </h3>
                    </div>
                @include('frontend.clearfix')
                <!-- TOVAR INFORMATION -->
                    <div class="tovar_information">
                        <div class="card mb-4 bg-info">
                            <h2 class="text-center pt-4 text-white">@lang('site.description')</h2>
                        </div>
                            @include('partials/box_info')
                    </div>
                    <!-- //TOVAR INFORMATION -->
                </div>
                <!-- //TOVAR DETAILS WRAPPER -->
            </div>
            <!-- //ROW -->
        </div>
        <!-- //CONTAINER -->
    </section>
    <!-- //TOVAR DETAILS -->

    <section class="container">
         @include('messages.flash_message')
        
         <questions  :product="{{$item}}" :user="{{json_encode(Auth::user())}}"></questions>
       
    </section>


    <!-- BANNER SECTION -->
<!--     <section class="banner_section">

        <div class="container">

            <div class="row">

                <div class="banner_wrapper">
                    <div class="col-lg-9 col-md-9">
                        <a class="banner type4 margbot40" href="javascript:void(0);">
                            <img src="{{ url('images/tovar') }}/banner4.jpg" alt=""/></a>
                    </div>

                    <div class="col-lg-3 col-md-3"><a class="banner nobord margbot40" href="javascript:void(0);">
                            <img src="{{ url('images/tovar') }}/banner5.jpg" alt=""/></a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


    <!-- NEW ARRIVALS -->
    <section class="new_arrivals padbot50">

        <!-- CONTAINER -->
        <div class="container">
            <h2>@lang('site.arrivals')</h2>

            <!-- JCAROUSEL -->
            <div class="jcarousel-wrapper">

                <div class="jcarousel">
                    <ul>
                        @foreach($latest as $row)
                            <li>
                                <!-- TOVAR -->
                                <div class="tovar_item_new">
                                    <div class="tovar_img">
                                        <img src="{{ url('images/products') }}/{{$row->a_img}}" alt=""/>
                                        <a class="open-project tovar_view"
                                           href="{{ url('/') }}/{{$row->category->cat}}/{{$row->slug}}/{{$row->id}}"><?= _('quick view')?></a>
                                    </div>
                                    <div class="tovar_description clearfix">
                                        <a class="tovar_title"
                                           href="{{ url('/') }}/{{$row->category->cat}}/{{$row->slug}}/{{$row->id}}">{{$row->name}}</a>
                                        <span class="tovar_price">{!! Helper::price($row->price) !!}
                                            &nbsp BsS</span>
                                    </div>
                                </div>
                                <!-- //TOVAR -->
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- //JCAROUSEL -->
        </div>
        <!-- //CONTAINER -->
    </section>
    <!-- //NEW ARRIVALS -->
@endsection