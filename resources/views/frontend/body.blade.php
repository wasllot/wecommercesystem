@extends('frontend.master')
@section('content')
    @include('frontend/sliders')
    <!-- TOVAR SECTION -->
    <section class="" style="padding-top: 2rem;">

        <!-- CONTAINER -->
        <div class="container">
            <h2>@lang('site.featured')</h2>
            <!-- <h2>Productos</h2> -->

            <!-- ROW -->
            <div class="row" data-appear-top-offset='-100'
                     data-animated='fadeInUp'>

                    <!-- BANNER -->
                    <div class="col-lg-3 col-md-3 col-6" style="float: left;">
                        <a class="banner type3 margbot40" href="javascript:void(0);">
                            <img  class="img-fluid" src="{{ url('images/tovar') }}/sh-1.png" alt=""/></a>
                    </div>
                    <!-- //BANNER -->

                     @include('partials/item')
                    <!-- <div class="respond_clear_768"></div> -->

                    <!-- BANNER -->
                    <div class="col-lg-3 col-md-3 col-6" style="float: right;">
                        <a class="banner type1 margbot30" href="javascript:void(0);">
                            <img  class="img-fluid" src="{{ url('images/tovar') }}/sh-p1.png" alt="" /></a>
                        <a class="banner type2 margbot40" href="javascript:void(0);">
                            <img  class="img-fluid" src="{{ url('images/tovar') }}/sh-p2.png" alt="" /></a>
                    </div>

                </div>
               

                    <!-- //BANNER -->

                </div>
                <!-- //TOVAR WRAPPER -->
            <!-- //ROW -->
            <!-- ROW -->
                        <!-- ROW -->
<!--             <div class="row">
                <div class="banner_wrapper" data-appear-top-offset='-100'
                     data-animated='fadeInUp'>
                    <div class="col-lg-9 col-md-9">
                        <a class="banner type4 margbot40" href="javascript:void(0);">
                            <img  class="img-fluid" src="{{ url('images/tovar') }}/banner4.jpg" alt=""/></a>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <a class="banner nobord margbot40" href="javascript:void(0);">
                            <img  class="img-fluid" src="{{ url('images/tovar') }}/banner5.jpg" alt=""/></a>
                    </div>
                </div>
            </div> -->
            <!-- //ROW -->

        </div>
        <!-- //CONTAINER -->
    </section>
    <!-- //TOVAR SECTION -->


    <!-- NEW ARRIVALS -->
    <section class="new_arrivals padbot50" style="background-color: white; padding-top: 2rem; padding-bottom: 2rem;">

        <!-- CONTAINER -->
        <div class="container">
            <h2>@lang('site.arrivals')</h2>
            <!-- <h2>Nuevos productos</h2> -->

            <!-- JCAROUSEL -->
            <div class="jcarousel-wrapper">

                <!-- NAVIGATION -->
                <div class="jCarousel_pagination">
                    <a href="javascript:void(0);"
                       class="jcarousel-control-prev">
                        <i class="fa fa-angle-left"></i></a>
                    <a href="javascript:void(0);"
                       class="jcarousel-control-next">
                        <i class="fa fa-angle-right"></i></a>
                </div>
                <!-- //NAVIGATION -->

                <div class="jcarousel" data-appear-top-offset='-100'
                     data-animated='fadeInUp'>
                    <ul>
                        @foreach($latest as $row)
                            <li>
                                <!-- TOVAR -->
                                <div class="tovar_item_new">
                                    <div class="tovar_img">
                                        <img src="{{ url('images/products') }}/{{$row->a_img}}" alt=""/>
                                        <a class="open-project tovar_view"
                                           href="{{ url('/') }}/{{$row->category->cat}}/{{$row->slug}}/{{$row->id}}">
                                            @lang('site.quick view')</a>
                                    </div>
                                    <div class="tovar_description clearfix">
                                        <a class="tovar_title"
                                           href="{{ url('/') }}/{{$row->category->cat}}/{{$row->slug}}/{{$row->id}}">{{$row->name}}</a>

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

    <!-- <hr class="container"> -->
@endsection