@extends('frontend.master')
@section('content')
        <!-- BREADCRUMBS -->
<section class="breadcrumb parallax margbot30"></section>
<!-- //BREADCRUMBS -->

<!-- PAGE HEADER -->
<section class="page_header">

    <!-- CONTAINER -->
    <div class="container">
<!--         <h3 class="pull-left">
            <b><?= _('Shopping Bag')?></b>
        </h3> -->

        <div class="pull-right">
            <a class="py-2" href="{{ url('fullrepuesto') }}">@lang('site.back')<i class="fa fa-angle-right"></i></a>
        </div>
    </div>
    <!-- //CONTAINER -->
</section>
<!-- //PAGE HEADER -->
<!-- SHOPPING BAG BLOCK -->
<section class="shopping_bag_block">

    <!-- CONTAINER -->
    <div class="container">

        <!-- ROW -->
        <div class="row">

            <!-- CART TABLE -->
            <script type="text/javascript">
                function clear_cart() {
                    var result = confirm('¿Seguro que quiere eliminar todos los productos?');

                    if (result) {
                        window.location = "{{ url('cart/delete') }}";
                    } else {
                        return false;
                    }
                }
            </script>
            <div class="col-lg-9 col-md-9 padbot40">
                <div id="heading">
                    <h2 align="center"><?= _('Productos de tu carrito')?></h2>

                    <h3 align="center"><font color="red">
                            <?php //echo $this->session->flashdata('message');?></font></h3>
                </div>
                <div id="text">
                    @if ($cart->first() == '')
                        <h3 class="pull-left">
                            <b><?= _('Para agregar productos a tu carrito haz click en el botón "Añadir al carrito"')?></b>
                        </h3>
                    @endif
                </div>
                <table class="shop_table">
                    @if ($cart)
                        <thead>
                        <tr>
                            <th class="product-thumbnail"></th>
                            <th class="product-name">ID</th>
                            <th class="product-name">@lang('site.name')</th>
                            <th class="product-price">@lang('site.price')</th>
                            <th class="product-quantity">@lang('site.quantity')</th>
                            <th class="product-subtotal">@lang('site.amount')</th>
                            <th class="product-remove">@lang('site.cancel product')</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        <?php //dd($cart) ?>
                        @foreach ( $cart as $item )
                            <tr class="cart_item">
                                <td class="product-thumbnail">
                                    <a href="{{$item->options->img}}">
                                        <img src="{{$item->options->img}}"
                                             width="100px" alt=""/></a></td>
                                <td>{{$i++}}</td>
                                <td class="product-name">
                                    <a href="{{ url('/') }}/{{$item->name}}/{{$item->id}}">{{$item->name}}</a>
                                </td>
                                <td class="product-price">
                                    {!! Helper::price($item->price) !!}&nbsp bss
                                </td>
                                <td>
                                    {!! Form::open(['url' => 'cart/update', 'method' => 'put']) !!}
                                    {!! Form::hidden('qty['.$item->id.'][rowId]', $item->rowId) !!}
                                    {!! Form::text('qty['.$item->id.'][qty]',$item->qty,
                                        ['size' => '1','style' => 'text-align: center','maxlength' => '3']) !!}
                                </td>
                                <td class="product-subtotal">
                                    {!! Helper::price($item->subtotal) !!}&nbsp bss
                                </td>
                                <td class="product-remove">
                                    <a href="{{ url('cart/remove') }}/{{$item->rowId}}">
                                        <span><?= _('Eliminar')?></span><i>X</i></a>
                                </td>
                                @endforeach
                                @endif
                            </tr>
                        </tbody>
                </table>
            </div>
            <!-- //CART TABLE -->

            <!-- SIDEBAR -->
            <div id="sidebar" class="col-lg-3 col-md-3 padbot50">

                <!-- BAG TOTALS -->
                <div class="sidepanel widget_bag_totals">
                    <h3><?= _('Total')?></h3>
                    <table class="bag_total">
                        <tr class="shipping clearfix">
                            <th><?= _('Envío')?></th>
                            <td><?= _('Sin calcular')?></td>
                        </tr>
                        <tr class="total clearfix">
                            <th><?= _('Total')?></th>
                            @if ($cart)
                                <td>{!! Helper::price($grand_total) !!}&nbsp bss</td>
                            @endif
                        </tr>
                    </table>
                    <input type="button" class="btn active" value="Limpiar carrito" onclick="clear_cart()">
                    {!! Form::submit('Update Cart', ['class' => 'btn inactive']) !!}
                    {!! Form::close() !!}
                    <a class="btn active" href="{{ url('checkout/shipping') }}"><?= _('Pagar')?></a> <a
                            class="btn inactive" href="{{ url('cms') }}"><?= _('Continuar')?></a>
                </div>
                <!-- //REGISTRATION FORM -->
            </div>
            <!-- //SIDEBAR -->
        </div>
        <!-- //ROW -->
    </div>
    <!-- //CONTAINER -->
</section>
<!-- //SHOPPING BAG BLOCK -->
@endsection