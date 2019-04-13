<h3>@lang('site.by price')</h3>
@if  (Request::input('price')=='asc')
    <h4><b><a style="color:#5fba7d" href="#" id="priceasc">Ascendiente</a></b></h4>
@else
    <h4><a href="#" id="priceasc">Ascendiente</a></h4>
@endif
@if  (Request::input('price')=='desc')
    <h4><b><a style="color:#5fba7d" href="#" id="pricedesc">Descendiente</a></b></h4>
@else
    <h4><a href="#" id="pricedesc">Descendiente</a></h4>
@endif

<h3>@lang('site.by name')</h3>

@if  (Request::input('name')=='asc')
    <h4><b><a style="color:#5fba7d" href="#" id="nameasc">Ascendiente</a></b></h4>
@else
    <h4><a href="#" id="nameasc">Ascendiente</a></h4>
@endif
@if  (Request::input('name')=='desc')
    <h4><b><a style="color:#5fba7d" href="#" id="namedesc">Descendiente</a></b></h4>
@else
    <h4><a href="#" id="namedesc">Descendiente</a></h4>
@endif