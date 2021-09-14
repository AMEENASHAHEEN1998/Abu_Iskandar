@extends('front.layout.layout')

@section('title')
    {{ trans('front/header.Delivery_Points') }}
@endsection


@section('content')
    <!--banner-->
    <div class="banner-top" >
        <div class="container">

            <h3 style="font-family: 'Amiri', serif ;">{{ trans('front/header.Delivery_Points') }}</h3>
            <h4 style="font-family: 'Amiri', serif ;"><a href="{{route('AbuEskandar.home')}}">{{ trans('front/header.Home') }}</a><label>/</label>

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

        <div class="distribute" style="font-family: 'Amiri', serif ;">
            <img src="{{asset('front/images/index/bus.jpg')}}" alt="">

            <h1 style="font-family: 'Amiri', serif ">{{ trans('front/header.Delivery_Points') }}</h1>
            @foreach ($distributes as  $place =>$distribute)

                    <h2>{{$place}}</h2>
                    <ul>
                    @foreach ($distribute as $d)

                        <li><strong>الاسم :{{ $d->{'name_' . $lng} }} </strong>
                            <strong>
                                 <i class="fa fa-phone"></i>  {{$d->phone_number}}
                            </strong>
                        </li>

                    @endforeach
                </ul>



            @endforeach

        </div>







    </div>
    </div>

    <!-- //article -->

@endsection
