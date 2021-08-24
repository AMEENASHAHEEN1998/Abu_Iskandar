@extends('front.layout.layout')

@section('title')
    {{ trans('front/header.Delivery_Points') }}
@endsection


@section('content')
    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h3>{{ trans('front/header.Delivery_Points') }}</h3>
            <h4><a href="{{route('AbuEskandar.home')}}">{{ trans('front/header.Home') }}</a><label>/</label>
                <a href="{{route('AbuEskandar.distributor')}}">{{ trans('front/header.Delivery_Points') }}</a>
            </h4>
        </div>
    </div>
    <div class="clearfix"> </div>




    <!-- article -->
    <div class="container">
        <br>
        <br>
        <?php
        $lng = app()->getLocale();
        ?>

        <div class="distribute">
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
