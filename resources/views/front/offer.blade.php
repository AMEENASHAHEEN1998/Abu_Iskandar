@extends('front.layout.layout')
@section('title')
    {{ trans('front/header.Offer') }}
@endsection
@section('content')
      <!-- Carousel
    ================================================== -->
@include('front.layout.myCarousel')
    <!--content-->
    <div class="content-top offer-w3agile">
        <div class="container ">
            <div class="spec ">
                <h3 >{{ trans('front/header.offers') }}</h3>
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
            @if ($offers ->count() >=1)
            @foreach ($offers as $Offer)

            <div class="col-md-3 m-wthree">
              <div class="col-m">
              <a  data-toggle="modal"
              data-target="#offer{{ $Offer->id }}" class="offer-img">
                      <img src="{{asset('upload/admin/offer/'.$Offer->image)}}" class="img-responsive" alt="">
                      <div class="offer"><p ><span>{{ trans('front/header.offers') }}</span></p></div>

                  </a>

                  <div class="mid-1">
                      <div class="women">

                        <h6>
                              <h4 class="text-center"  >{{ (app()->getLocale() == 'en' ? $Offer->offer_title_en :$Offer->offer_title_ar)  }}</h4 >
                              <a class="btn btn-info btn-sm" data-toggle="modal"
                              data-target="#offer{{ $Offer->id }}" >التفاصيل</a>
                              {{-- <a class="btn btn-info btn-sm" data-toggle="modal"
                              data-target="#show{{ $Product->id }}">{{ $Product->product_name_ar }}</a> --}}

                        </h6>

                      </div>
                      <div class="mid-2">

                          <div class="clearfix"></div>
                      </div>

                  </div>
              </div>
          </div>

          <!-- edit_modal_Category -->
<div class="modal fade" id="offer{{ $Offer->id }}"  tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                    العرض
               </h5>
               <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
            <br>
            {{-- <h3> عرض المنتج</h3> --}}

            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   {{ $Offer->offer_title_ar }}
            </h5>
            <p>{{$Offer->description_ar}}</p>
            <br>

            <img src="{{asset('upload/admin/offer/'.$Offer->image)}}" class="img-responsive" alt="">
            <p>


                {{-- <b>السعر : {{ $Price->price}}         </b> --}}

                <b>العرض : {{ $Offer->price}}    </b>
                <br>
                 </p>


           </div>
       </div>
   </div>
</div>
@endforeach

            @else
                <p style="font-size: 22px">لا يوجد عروض لعرضها </p>

                @endif







                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection
