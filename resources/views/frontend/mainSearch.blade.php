{!!Form::open(['method' => 'GET', 'url' => 'search'])!!}

    <div class="row">

        <div class="col-lg-2"></div>

        <div class="col-lg-8">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 p-0 text-uppercase">

                    <input type="text" class="form-control search-slt" name="search" id="searchProduct" placeholder="PRODUCTO">

                </div>

                <div class="col-lg-3 col-md-3 col-sm-4 p-0">

                    <select class="form-control search-slt text-uppercase" name="child">

                        <option selected disabled hidden>@lang('site.category')</option>
                        @foreach($menu as $parent)

                            <option disabled class="font-weight-bold" >{{$parent->cat}}</option>

                            @foreach($parent->children as $child)

                                <option style="font-size: 10px;" class="float-right" value="{{$child->cat_id}}" required> {{$child->cat}}</option>

                            @endforeach

                        @endforeach

                    </select>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-2 p-0">

					{!! Form::button('Buscar', array('type' => 'submit','class' => 'btn btn-default')) !!}

                </div>

            </div>

        </div>

        <div class="col-lg-2"></div>

    </div>

{!! Form::close() !!}