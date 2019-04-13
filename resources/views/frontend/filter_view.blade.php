@extends('frontend.master')
@section('content')
    <!-- BREADCRUMBS -->
    <section
            class="breadcrumb {{$cats[$parent]['name']}} parallax margbot30">
        <style>
            .breadcrumb.{{$cats[$parent]['name']}}
  {
                margin: 0;
                padding: 179px 0 81px;
                border-radius: 0;
                border: 0;
                background-color: inherit;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .breadcrumb.{{$cats[$parent]['name']}}
  {
            background-image: url({{url('images/breadcrumb_bg2.jpg')}}); 
                
                /*background-image: url({{ url('images/category') }}/{{$cats[$parent]['banner']}});*/
            }
        </style>
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


                    <!-- Live Search Form -->
                    <!--<input type="text" name="search_text" id="search_text" placeholder="Live Search" class="form-control"/> -->
                    <!-- //Live Search Form -->
                    @include('frontend/product_container')
                </div>
                <!-- //SHOP PRODUCTS -->
            </div>
            <!-- //ROW -->
        </div>
        <!-- //CONTAINER -->
    </section>
@section('script')
    <script type="text/javascript">
        var route = '{{ url('items/search') }}/{{$cats[$parent]['id']}}';
        var autoRoute = '{{ url('search/autocomplete') }}';
        //Live Search AJAX
        $(document).ready(function () {
            $('#search_text').keyup(function () {
                var txt = $(this).val();
                if (txt != '') {
                    $.ajax({
                        url: route,
                        method: "get",
                        data: {search: txt},
                        dataType: "json",
                        success: function (data) {
                            $('#ajaxproducts').html(data);
                        }
                    });
                }
                else {
                    $('#ajaxproducts').html('');
                }
            });
        });
        //End Live Search
        //Autocomplete
        $(autoComplete);
        function autoComplete() {
            $("#search_auto").autocomplete({
                source: autoRoute,
                minLength: 3,
                position: { my: "left top", at: "center"},
            });
        }
        //End Autocomplete
    </script>
@endsection
<!-- //SHOP -->
@endsection