<!-- SHOP FILTER -->
<div class="sidepanel widget_sizes">
    <h3>@lang('site.by cats')</h3>

    <form class="login_form" name="pr_cat" id="categories" role="form"
          method="GET" action="{{ url('filter/products/'.$cats[$parent]['id'].'') }}">

        @foreach($cats[$parent]['sub_cat'] as $row)
            <input type="checkbox" id="{{$row['name']}}" name="categ[]" value="{{$row['id']}}"
                    {{ (in_array($row['id'],$category))?'checked="checked"':''}} />
            <label for="{{$row['name']}}">
                <li><a>{{$row['name']}}</a></li>
            </label>
        @endforeach

        <div class="sidepanel widget_brands">

            @include('frontend.sorting')

        </div>

        <div class="sidepanel widget_brands">

            <h3>@lang('site.by brands')</h3>
            @foreach($properties['brand'] as $row)
                <input type="checkbox" id="{{$row->brand}}" name="brand[]" value="{{$row->brand_id}}"
                        {{(in_array($row->brand_id, $brand)) ? 'checked="checked"' : ''}}/>
                <label for="{{$row->brand}}">{{$row->brand}}
                    @if($row->brandCount)
                        <span>({{$row->brandCount->aggregate}})</span>
                    @else
                        <span>Out of Stock</span>
                    @endif
                </label>
            @endforeach
        </div>
        <input type="submit" value="Submit" class="submit">
    </form>
</div>
<!-- //SHOP FILTER -->