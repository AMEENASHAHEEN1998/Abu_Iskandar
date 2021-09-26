@extends('front.layout.layout')

@section('title')
    {{ trans('front/header.Delivery_Points') }}
@endsection


@section('content')
    <!--banner-->
    <div class="banner-top" >
        <div class="container">

            <h3 >{{ trans('front/header.Delivery_Points') }}</h3>
            <h4 ><a href="{{route('AbuEskandar.home')}}">{{ trans('front/header.Home') }}</a><label>/</label>

                <a href="{{route('AbuEskandar.distributor')}}">{{ trans('front/header.Delivery_Points') }}</a>
            </h4>
        </div>
    </div>
    <div class="clearfix"> </div>




    <!-- article -->
    <div class="container" >
        <br>
        <br>
        <?php
        $lng = app()->getLocale();
        ?>

        <div class="distribute" >
            <img src="{{asset('front/images/index/bus.jpg')}}" alt="">

            <h1>{{ trans('front/header.Delivery_Points') }}</h1>
            {{-- @foreach ($distributes as  $place =>$distribute)


                    <ul>


                    @foreach ($distribute as $d)

                    @foreach ($cites as $city)
                    {{-- $place=$place-1 --}}
                        {{-- @if ($city->id == $place)
                            <h2>{{$city->name}}</h2>
                        @endif --}}

                    {{-- @endforeach
                        <li><strong>الاسم :{{ $d->{'name_' . $lng} }} </strong>
                            <strong>
                                 <i class="fa fa-phone"></i>  {{$d->phone_number}}
                            </strong>
                        </li>

                    @endforeach --}}

                    {{-- <br>
                </ul>



            @endforeach  --}}


                @foreach ($Cites as $City )
                     <h2>{{ $City->name }}</h2>

                    @foreach ($distributor_types as $distributor_type )
                    <li><strong>{{ $distributor_type->name_ar }}</strong></li>

                        @foreach ($distributors as $distributor )
                             @if ($City->id == $distributor->city_id and $distributor_type->id == $distributor->distributor_type_id )
                             <strong>
                                <i class="fa fa-phone"></i>  {{ $distributor->phone_number }}
                           </strong>
                             @endif
                        @endforeach
                    @endforeach
                @endforeach



        </div>







    </div>
    </div>

    <!-- //article -->

@endsection
