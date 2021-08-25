@extends('front.layout.layout')
@section('content')
        <!-- Carousel
    ================================================== -->
    @foreach ( $CategoryImage as $CategoryImage )

    <img id="first-slide" class="first-slide" src="{{asset('uploads/'.$CategoryImage->image)}}" alt="First slide"></a>
    @endforeach
    {{-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">

          <div class="item active">
             <a href="kitchen.html"><img class="first-slide" src="{{asset('uploads/'.$CategoryImage->image)}}" alt="First slide"></a>

          </div>


          {{-- <div class="item">
            <a href="care.html"> <img class="second-slide " src="{{asset('front/images/ba1.jpg')}}" alt="Second slide"></a>

          </div>
          <div class="item">
             <a href="hold.html"><img class="third-slide " src="{{asset('front/images/ba2.jpg')}}" alt="Third slide"></a>

          </div>
        </div>

      </div><!-- /.carousel --> --}}

  <!--content-->
  {{-- <div class="kic-top ">
      <div class="container ">
      <div class="kic ">
              <h3>Popular Categories</h3>

          </div>
          <div class="col-md-4 kic-top1">
              <a href="single.html">
                  <img src="{{asset('front/images/ki.jpg')}}" class="img-responsive" alt="">
              </a>
              <h6>Dal</h6>
              <p>Nam libero tempore</p>
          </div>
          <div class="col-md-4 kic-top1">
              <a href="single.html">
                  <img src="{{asset('front/images/ki1.jpg')}}" class="img-responsive" alt="">
              </a>
              <h6>Snacks</h6>
              <p>Nam libero tempore</p>
          </div>
          <div class="col-md-4 kic-top1">
              <a href="single.html">
                  <img src="{{asset('front/images/ki2.jpg')}}" class="img-responsive" alt="">
              </a>
              <h6>Spice</h6>
              <p>Nam libero tempore</p>
          </div>
      </div>
  </div> --}}

  <!--content-->
          <div class="product">
          <div class="container">
              <div class="spec ">
                  <h3>{{trans('admin/dashboard.product')}}</h3>
                  <div class="ser-t">
                      <b></b>
                      <span><i></i></span>
                      <b class="line"></b>
                  </div>
              </div>
                  <div class=" con-w3l agileinf">
                      @foreach ($Products as $Product)
                      <div class="col-md-3 pro-1">
                        <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                                <img src="{{asset('uploads/'.$Product->image)}}" class="img-responsive" alt="">
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="single.html">{{ $Product->product_name_ar }}</a></h6>
                                </div>
                                <div class="mid-2">
                                    {{-- <p ><label>$7.00</label><em class="item_price">$6.00</em></p> --}}
                                    <p>
                                        @foreach (App\Models\price::where('product_id' , $Product->id)->get() as $Price )

                                        <b>{{ $Price->price}}</b>
                                        <b>{{ $Price->size}}</b>
                                        <b>||</b>
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
                      @endforeach


                              <div class="clearfix"></div>
                           </div>
          </div>
      </div>
@endsection
