@extends('front.layout.layout')

@section('title')
    {{ trans('front/header.title') }}
@endsection
@section('content')

    <div class="video" data-vide-bg="{{ asset('video/abuskander.mp4') }}" style="height: 400px">
        <div class="container">
            <div class="banner-info">

                <div class="search-form">
                    <form action="#" method="post">

                    </form>
                </div>
            </div>


        </div>
    </div>

    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')
    </script>
    <script src="{{ asset('front/js/jquery.vide.min.js') }}"></script>

    <!--content-->
    {{-- @if ($offers->count() >= 1)




<!--content-->


    <div class="content-tops ">
            <div class="container ">
                <div class="spec ">
                    <h3>{{ trans('front/header.Offer') }}</h3>
                    <div class="ser-t">
                        <b></b>
                        <span><i></i></span>
                        <b class="line"></b>
                    </div>
                </div>
                <div class="tab-head ">
                    <nav class="nav-sidebar">
                        <ul class="nav tabs ">

                        </ul>
                    </nav>
                    <div class=" tab-content tab-content-t ">
                        <?php
                        $lng = app()->getLocale();
                        ?>

                        <div class="tab-pane active text-style" id="tab1">
                            <div class=" con-w3l">


                                @foreach ($offers as $offer)
                                    <div class="col-md-3 m-wthree">
                                        <div class="col-m">
                                            <a href="#" data-toggle="modal" data-target="#show{{ $offer->id }}"
                                                class="offer-img">
                                                <img src="{{ asset('upload/admin/offer/' . $offer->image) }}"
                                                    class="img-responsive" alt="">
                                            </a>
                                            <div class="mid-1">
                                                <div class="women">
                                                    <h6><a>{{ $offer->{'offer_title_' . $lng} }}</a></h6>
                                                </div>
                                                <div class="mid-2">
                                                    <p><label></label><em class="item_price">{{ $offer->price }}</em>
                                                    </p>

                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="modal fade" id="show{{ $offer->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        عرض المنتج
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ $offer->{'offer_title_' . $lng} }}
                                                    </h5>
                                                    <br>

                                                    <img src="{{ asset('upload/admin/offer/' . $offer->image) }}"
                                                        class="img-responsive" alt="">

                                                    <br>
                                                    <p>السعر : {{ $offer->price }}</p>

                                                    <p>


                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else

                         @endif






                    <div class="clearfix"></div>
                    </div>
                </div>

            </div>
                </div>

                </div>
            </div>
    </div> --}}

    <!--content-->
    <div class="content-top ">
        <div class="container ">
            <div class="spec ">
                <h3>{{ trans('front/header.our_products') }}</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
                <div class="tab-head "  style="font-family: 'Amiri', serif ; font-weight : bold">
                    <nav class="nav-sidebar">
                        <ul class="nav tabs ">
                            @foreach ($Categories as $Category )
                            <li class="@if ($Category->id == $loop->first)
                                {{ 'active' }}
                            @endif"><a href="#tab{{$Category->id}}" data-toggle="tab">
                                @if (App::getLocale() == 'en')

                                    {{ $Category->category_name_en }}
                                    @else
                                    {{ $Category->category_name_ar }}
                                @endif</a>

                            </li>
                            @endforeach

                        </ul>
                    </nav>
                    <div class=" tab-content tab-content-t ">
                        @foreach ($Categories as $Category )

                        <div class="tab-pane text-style @if ($Category->id == $loop->first)
                            {{ 'active' }}
                        @endif" id="tab{{$Category->id}}">

                            <div class=" con-w3l ">
                                @foreach (App\Models\Product::where('category_id' , $Category->id)->take(4)->get() as $Product)

                                <div class="col-md-3 m-wthree">
                                  <div class="col-m">
                                  <a href="#" data-toggle="modal" data-toggle="modal"
                                  data-target="#show{{ $Product->id }}" class="offer-img">
                                          <img src="{{asset('uploads/'.$Product->image)}}" class="img-responsive" alt="">

                                      </a>

                                      <div class="mid-1">
                                          <div class="women">

                                              <h6>
                                                  <h4 class="text-center"  style="font-family: 'Amiri', serif">{{ $Product->product_name_ar }}</h4 >
                                                  <a class="btn btn-info btn-sm" data-toggle="modal"
                                                  data-target="#show{{ $Product->id }}">التفاصيل</a>
                                                  {{-- <a class="btn btn-info btn-sm" data-toggle="modal"
                                                  data-target="#show{{ $Product->id }}">{{ $Product->product_name_ar }}</a> --}}

                                                  </h6>

                                              </div>
                                          <div class="mid-2">
                                              {{-- <p ><label>$7.00</label><em class="item_price">$6.00</em></p> --}}
                                              <p>
                                                  @foreach (App\Models\price::where('product_id' , $Product->id)->get() as $Price )




                                                  {{-- <b>       الحجم : {{ $Price->size}}    </b> --}}
                                                  {{-- <br> --}}
                                                  @endforeach </p>
                                                {{-- <div class="block">
                                                  <div class="starbox small ghosting"> </div>
                                              </div> --}}
                                              <div class="clearfix"></div>
                                          </div>
                                          {{-- <div class="add">
                                             <button class="btn btn-danger my-cart-btn my-cart-b" data-id="24" data-name="Wheat" data-summary="summary 24" data-price="6.00" data-quantity="1" data-image="images/of24.png">Add to Cart</button>
                                          </div> --}}
                                      </div>
                                  </div>
                              </div>

                              <!-- edit_modal_Category -->
                    <div class="modal fade" id="show{{ $Product->id }}"  tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                       id="exampleModalLabel">
                                       عرض المنتج
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
                                       {{ $Product->product_name_ar }}
                                </h5>
                                <p>{{$Product->decription}}</p>
                                <br>

                                <img src="{{asset('uploads/'.$Product->image)}}" class="img-responsive" alt="">
                                <p>
                                    @foreach (App\Models\price::where('product_id' , $Product->id)->get() as $Price )


                                    {{-- <b>السعر : {{ $Price->price}}         </b> --}}

                                    <b>الأصناف : {{ $Price->size}}    </b>
                                    <br>
                                    @endforeach </p>


                               </div>
                           </div>
                       </div>
                   </div>
                                @endforeach


                                {{-- <div class="clearfix"></div>--}}
                          </div>
                        </div>
                        @endforeach
                </div>

        </div>
        </div>
        </div>

    <!--content-->



    {{-- about --}}
    <div class="container">
        @include('front.layout.aboutcontent')
     </div>
    {{-- about --}}
    <div class="content-mid">
        <div class="container">

            <div class="col-md-3 col-sm-6 m-w3ls">
                <div class="col-md1 ">
                    <a href="#">
                        <img src="{{ asset('front/images/index/amenalam.png') }}" class="img-responsive img" alt="">
                        <div class="big-sa">
                            {{-- <h6>New Collections</h6> --}}
                            <h3><span>{{ trans('front/header.seasoning') }} </span></h3>
                            <p>{{ trans('front/header.featured_Season') }}
                            </p>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-md-3 col-sm-6 m-w3ls">
                <div class="col-md1 ">
                    <a href="#">
                        <img src="{{ asset('front/images/index/nasser.png') }}" class="img-responsive img" alt="">
                        <div class="big-sa">
                            {{-- <h6>New Collections</h6> --}}
                            <h3><span>{{ trans('front/header.seasoning') }} </span></h3>
                            <p>{{ trans('front/header.featured_Season') }}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 m-w3ls">
                <div class="col-md1 ">
                    <a href="#">
                        <img src="{{ asset('front/images/index/saftawe.png') }}" class="img-responsive img" alt="">
                        <div class="big-sa">
                            {{-- <h6>New Collections</h6> --}}
                            <h3><span>{{ trans('front/header.seasoning') }} </span></h3>
                            <p>{{ trans('front/header.featured_Season') }}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 m-w3ls">
                <div class="col-md1 ">
                    <a href="#">
                        <img src="{{ asset('front/images/index/jaalia.png') }}" class="img-responsive img" alt="">
                        <div class="big-sa">
                            {{-- <h6>New Collections</h6> --}}
                            <h3><span>{{ trans('front/header.seasoning') }} </span></h3>
                            <p>{{ trans('front/header.featured_Season') }}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            {{-- <div class="col-md-4 col-sm-6 m-w3ls">


                <div class="col-md1 ">
                    <a href="#">
                        <img src="{{ asset('front/images/index/olive.png') }}" class="img-responsive img" alt="">
                        <div class="big-sa">
                            <h3><span>{{ trans('front/header.seasoning') }} </span></h3>
                            <p>{{ trans('front/header.featured_Season') }}
                            </p>
                        </div>
                    </a>
                </div>

                <div class="col-md3 ">
                    <a href="#">
                        <img src="{{ asset('front/images/index/nuts.png') }}" style="padding-top: 21px"
                            class="img-responsive img" alt="">
                        <div class="big-sa">
                            <h3><span>{{ trans('front/header.seasoning') }} </span></h3>
                            <p>{{ trans('front/header.featured_Season') }}
                            </p>
                        </div>
                    </a>
                </div>
            </div> --}}





            <div class="clearfix"></div>
        </div>
    </div>
    <!--content-->
    @include('front.layout.myCarousel')

    <!--content-->

    <!-- Marketing messaging and featurettes
                      ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
        <br>
        <br>
        <br>
        <div class="spec ">
            <h3>{{ trans('admin/dashboard.staff') }}</h3>
            <div class="ser-t">
                <b> </b>
                <span><i> </i></span>
                <b class="line"> </b>
            </div>
        </div>
        <br>
        <?php
        $lng = app()->getLocale();
        ?>
        <!-- Three columns of text below the carousel -->
        <div class="row text-center">

            @foreach ($employes as $employe)
                <div class="col-lg-3">
                    <img class="rounded-circle" src="{{ asset('upload/admin/employee/' . $employe->image) }}"
                        alt="Generic placeholder image" width="120" height="120">
                    <br>
                    <br>
                    <h3>{{ $employe->{'employee_name_' . $lng} }}</h3>
                    <p>{{ $employe->job_title_ar }}</p>
                </div><!-- /.col-lg-4 -->
            @endforeach




            <!-- START THE FEATURETTES -->


            <div class="product">
                <div class="container">
                    <div class="spec ">
                        <h3>{{ trans('front/header.offers') }}</h3>
                        <div class="ser-t">
                            <b></b>
                            <span><i></i></span>
                            <b class="line"></b>
                        </div>
                    </div>
                    <div class=" con-w3l">
                        <div class="col-md-3 pro-1">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal" class="offer-img">
                                    <img src="{{ asset('front/images/of16.png') }}" class="img-responsive" alt="">
                                </a>


                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Moisturiser</a>(500 g)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$7.00</label><em class="item_price">$6.00</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add add-2">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1"
                                            data-name="product 1" data-summary="summary 1" data-price="6.00"
                                            data-quantity="1" data-image="{{ asset('front/images/of16.png') }}">Add to
                                            Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 pro-1">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal21" class="offer-img">
                                    <img src="{{ asset('front/images/of20.png') }}" class="img-responsive" alt="">
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Clips</a>(1 pack)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$7.00</label><em class="item_price">$6.00</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1"
                                            data-name="product 1" data-summary="summary 1" data-price="6.00"
                                            data-quantity="1" data-image="{{ asset('front/images/of20.png') }}">Add to
                                            Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 pro-1">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal22" class="offer-img">
                                    <img src="{{ asset('front/images/of21.png') }}" class="img-responsive" alt="">
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Conditioner</a>(250 g)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$5.00</label><em class="item_price">$4.50</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1"
                                            data-name="product 1" data-summary="summary 1" data-price="4.50"
                                            data-quantity="1" data-image="{{ asset('front/images/of21.png') }}">Add to
                                            Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 pro-1">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal23" class="offer-img">
                                    <img src="{{ asset('front/images/of22.png') }}" class="img-responsive" alt="">
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Cleaner</a>(250 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$4.00</label><em class="item_price">$3.50</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1"
                                            data-name="product 1" data-summary="summary 1" data-price="3.50"
                                            data-quantity="1" data-image="{{ asset('front/images/of22.png') }}">Add to
                                            Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 pro-1">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal24" class="offer-img">
                                    <img src="{{ asset('front/images/of23.png') }}" class="img-responsive" alt="">
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Gel</a>(150 g)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$1.00</label><em class="item_price">$0.80</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1"
                                            data-name="product 1" data-summary="summary 1" data-price="0.80"
                                            data-quantity="1" data-image="{{ asset('front/images/of23.png') }}">Add to
                                            Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
