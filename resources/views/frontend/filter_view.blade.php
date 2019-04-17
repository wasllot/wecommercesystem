@extends('frontend.master')

@section('content')

    <!-- BREADCRUMBS -->
    <section class="breadcrumb {{$cats[$parent]['name']}} parallax margbot30">

        <!-- CONTAINER -->
        <div class="container">

            <h2>{{$cats[$parent]['name']}}</h2>

        </div>

        <!-- //CONTAINER -->

    </section>

    <!-- //BREADCRUMBS -->

    <section class="shop">
        
        <div class="container">

            @include('frontend/search', ['url'=>'/items/search/'.$cats[$parent]['id'].''])

        </div>

    </section>

    <!-- SHOP BLOCK -->
    <section class="shop">

        <!-- CONTAINER -->
        <div class="container">

            <!-- ROW -->

            <div class="row">

                <!-- SIDEBAR -->
                <div id="sidebar" class="col-lg-3 col-md-3 col-sm-3 padbot50">

                    @include('frontend/shop_filter')

                </div>

                <!-- //SIDEBAR -->

                <!-- SHOP PRODUCTS -->

                <div class="col-lg-9 col-sm-9 padbot20">

                    <!-- SORTING TOVAR PANEL -->

                    <div class="sorting_options clearfix">

                        <div class="count_tovar_items">

                            <p>@lang('site.products')</p>

                            <span>Items</span>

                        </div>

                        <!-- //COUNT TOVAR ITEMS -->

                    </div>

                    <!-- //SORTING TOVAR PANEL -->

                    @include('frontend/product_container')

                </div>

                <!-- //SHOP PRODUCTS -->

            </div>

            <!-- //ROW -->

        </div>

        <!-- //CONTAINER -->

    </section>

<!-- //SHOP -->

@endsection