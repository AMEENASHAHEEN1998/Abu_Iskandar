@extends('front.layout.layout')
@section('content')
      <!-- Carousel
    ================================================== -->
@include('front.layout.myCarousel')
    <!--content-->
    <div class="content-top offer-w3agile">
        <div class="container ">
            <div class="spec ">
                <h3>{{ trans('front/header.offers') }}</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
            <div class=" con-w3l wthree-of">


                <?php
                $lng = app()->getLocale();
               ?>

                @foreach ($offers as $offer)
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                            <img src="{{asset('upload/admin/offer/'.$offer->image)}}" class="img-responsive" alt="">

                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="single.html">{{ $offer->{'offer_title_' . $lng} }}</a></h6>
                            </div>
                            <div class="mid-2">
                                <p><label></label><em class="item_price"><strong>{{$offer->price}}</strong> </em></p>

                                <div class="clearfix"></div>
                            </div>


                        </div>
                    </div>
                </div>
                @endforeach






                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection
