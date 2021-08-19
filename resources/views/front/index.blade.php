@extends('front.layout.layout')
@section('content')

<div class="video" data-vide-bg="{{asset('video/abuskander.mp4')}}" style="height: 400px" data-vide-options="loop: true, muted: false, position: 0% 0%">
    <div class="container">
		<div class="banner-info">

			<div class="search-form">
				<form action="#" method="post">

					{{-- <input type="text" placeholder="Search..." name="Search..."> --}}
					{{-- {{-- <input type="submit" value=" " > --}}
				</form>
			</div>
		</div>


    </div>
</div>

    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script src="{{asset('front/js/jquery.vide.min.js')}}"></script>

<!--content-->
<div class="content-top ">
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
                    <li class="active"><a href="#tab1" data-toggle="tab">Staples</a></li>
                    <li class=""><a href="#tab2" data-toggle="tab">Snacks</a></li>
                    <li class=""><a href="#tab3" data-toggle="tab">Fruits & Vegetables</a></li>
                    <li class=""><a href="#tab4" data-toggle="tab">Breakfast & Cereal</a></li>
                </ul>
            </nav>
            <div class=" tab-content tab-content-t ">
                <div class="tab-pane active text-style" id="tab1">
                    <div class=" con-w3l">
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                                    <img src="{{asset('front/images/of.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Moong</a>(1 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$2.00</label><em class="item_price">$1.50</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1"
                                            data-name="Moong" data-summary="summary 1" data-price="1.50"
                                            data-quantity="1" data-image="{{asset('front/images/of.png')}}">Add to Cart</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal2" class="offer-img">
                                    <img src="{{asset('front/images/of1.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Sunflower Oil</a>(5 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$10.00</label><em class="item_price">$9.00</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="2"
                                            data-name="Sunflower Oil" data-summary="summary 2" data-price="9.00"
                                            data-quantity="1" data-image="images/of1.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal3" class="offer-img">
                                    <img src="{{asset('front/images/of2.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Kabuli Chana</a>(1 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$3.00</label><em class="item_price">$2.00</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3"
                                            data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00"
                                            data-quantity="1" data-image="images/of2.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal4" class="offer-img">
                                    <img src="{{asset('front/images/of3.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Soya Chunks</a>(1 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$4.00</label><em class="item_price">$3.50</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="4"
                                            data-name="Soya Chunks" data-summary="summary 4" data-price="3.50"
                                            data-quantity="1" data-image="images/of3.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="tab-pane  text-style" id="tab2">
                    <div class=" con-w3l">
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal5" class="offer-img">
                                    <img src="{{asset('front/images/of4.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Lays</a>(100 g)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$1.00</label><em class="item_price">$0.70</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="5"
                                            data-name="Lays" data-summary="summary 5" data-price="0.70"
                                            data-quantity="1" data-image="images/of4.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal6" class="offer-img">
                                    <img src="{{asset('front/images/of5.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Kurkure</a>(100 g)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$1.00</label><em class="item_price">$0.70</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="6"
                                            data-name="Kurkure" data-summary="summary 6" data-price="0.70"
                                            data-quantity="1" data-image="images/of5.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal7" class="offer-img">
                                    <img src="{{asset('front/images/of6.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Popcorn</a>(250 g)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$2.00</label><em class="item_price">$1.00</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="7"
                                            data-name="Popcorn" data-summary="summary 7" data-price="1.00"
                                            data-quantity="1" data-image="images/of6.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal8" class="offer-img">
                                    <img src="{{asset('front/images/of7.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Nuts</a>(250 g)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$4.00</label><em class="item_price">$3.50</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="8"
                                            data-name="Nuts" data-summary="summary 8" data-price="3.50"
                                            data-quantity="1" data-image="images/of7.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="tab-pane  text-style" id="tab3">
                    <div class=" con-w3l">
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal9" class="offer-img">
                                    <img src="{{asset('front/images/of8.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Banana</a>(6 pcs)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$2.00</label><em class="item_price">$1.50</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="9"
                                            data-name="Banana" data-summary="summary 9" data-price="1.50"
                                            data-quantity="1" data-image="images/of8.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal10" class="offer-img">
                                    <img src="{{asset('front/images/of9.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Onion</a>(1 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$1.00</label><em class="item_price">$0.70</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="10"
                                            data-name="Onion" data-summary="summary 10" data-price="0.70"
                                            data-quantity="1" data-image="images/of9.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal11" class="offer-img">
                                    <img src="{{asset('front/images/of10.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html"> Bitter Gourd</a>(1 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$2.00</label><em class="item_price">$1.00</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="11"
                                            data-name="Bitter Gourd" data-summary="summary 11" data-price="1.00"
                                            data-quantity="1" data-image="images/of10.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal12" class="offer-img">
                                    <img src="{{asset('front/images/of11.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Apples</a>(1 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$4.00</label><em class="item_price">$3.50</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="12"
                                            data-name="Apples" data-summary="summary 12" data-price="3.50"
                                            data-quantity="1" data-image="images/of11.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="tab-pane text-style" id="tab4">
                    <div class=" con-w3l">
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal13" class="offer-img">
                                    <img src="{{asset('front/images/of12.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Honey</a>(500 g)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$7.00</label><em class="item_price">$6.00</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="13"
                                            data-name="Honey" data-summary="summary 13" data-price="6.00"
                                            data-quantity="1" data-image="images/of12.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 m-wthree">
                            <div class="col-m ">
                                <a href="#" data-toggle="modal" data-target="#myModal14" class="offer-img">
                                    <img src="{{asset('front/images/of13.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Chocos</a>(250 g)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$5.00</label><em class="item_price">$4.50</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="14"
                                            data-name="Chocos" data-summary="summary 14" data-price="4.50"
                                            data-quantity="1" data-image="images/of13.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 m-wthree">
                            <div class="col-m ">
                                <a href="#" data-toggle="modal" data-target="#myModal15" class="offer-img">
                                    <img src="{{asset('front/images/of14.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Oats</a>(1 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$4.00</label><em class="item_price">$3.50</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="15"
                                            data-name="Oats" data-summary="summary 15" data-price="3.50"
                                            data-quantity="1" data-image="images/of14.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal16" class="offer-img">
                                    <img src="{{asset('front/images/of15.png')}}" class="img-responsive" alt="">
                                    <div class="offer">
                                        <p><span>Offer</span></p>
                                    </div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">Bread</a>(500 g)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p><label>$1.00</label><em class="item_price">$0.80</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="16"
                                            data-name="Bread" data-summary="summary 16" data-price="0.80"
                                            data-quantity="1" data-image="images/of15.png">Add to Cart</button>
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
</div>
</div>

<!--content-->
<div class="content-mid">
    <div class="container">

        <div class="col-md-4 m-w3ls">
            <div class="col-md1 ">
                <a href="kitchen.html">
                    <img src="{{asset('front/images/index/col1.png')}}" class="img-responsive img" alt="">
                    <div class="big-sa">
                        {{-- <h6>New Collections</h6> --}}
                        <h3><span>{{trans('front/header.seasoning')}} </span></h3>
                        <p>{{trans('front/header.featured_Season')}}
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 m-w3ls1">
            <div class="col-md ">
                <a href="hold.html">
                    <img src="{{asset('front/images/co.jpg')}}" class="img-responsive img" alt="">
                    <div class="big-sale">
                        <div class="big-sale1">
                            <h3>Big <span>Sale</span></h3>
                            <p>It is a long established fact that a reader </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 m-w3ls">
            <div class="col-md2 ">
                <a href="kitchen.html">
                    <img src="{{asset('front/images/co2.jpg')}}" class="img-responsive img1" alt="">
                    <div class="big-sale2">
                        <h3>Cooking <span>Oil</span></h3>
                        <p>It is a long established fact that a reader </p>
                    </div>
                </a>
            </div>
            <div class="col-md3 ">
                <a href="hold.html">
                    <img src="{{asset('front/images/co3.jpg')}}" class="img-responsive img1" alt="">
                    <div class="big-sale3">
                        <h3>Vegeta<span>bles</span></h3>
                        <p>It is a long established fact that a reader </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--content-->
@include('front.layout.myCarousel')
<!--content-->
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
                    <a href="#" data-toggle="modal" data-target="#myModal17" class="offer-img">
                        <img src="{{asset('front/images/of16.png')}}" class="img-responsive" alt="">
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
                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1"
                                data-summary="summary 1" data-price="6.00" data-quantity="1"
                                data-image="{{asset('front/images/of16.png')}}">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pro-1">
                <div class="col-m">
                    <a href="#" data-toggle="modal" data-target="#myModal18" class="offer-img">
                        <img src="{{asset('front/images/of17.png')}}" class="img-responsive" alt="">
                    </a>
                    <div class="mid-1">
                        <div class="women">
                            <h6><a href="single.html"> Lady Finger</a>(250 g)</h6>
                        </div>
                        <div class="mid-2">
                            <p><label>$5.00</label><em class="item_price">$4.50</em></p>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="add">
                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1"
                                data-summary="summary 1" data-price="4.50" data-quantity="1"
                                data-image="images/of17.png">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pro-1">
                <div class="col-m">
                    <a href="#" data-toggle="modal" data-target="#myModal19" class="offer-img">
                        <img src="{{asset('front/images/of18.png')}}" class="img-responsive" alt="">
                    </a>
                    <div class="mid-1">
                        <div class="women">
                            <h6><a href="single.html"> Ribbon</a>(1 pc)</h6>
                        </div>
                        <div class="mid-2">
                            <p><label>$4.00</label><em class="item_price">$3.50</em></p>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="add">
                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1"
                                data-summary="summary 1" data-price="3.50" data-quantity="1"
                                data-image="{{asset('front/images/of18.png')}}">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pro-1">
                <div class="col-m">
                    <a href="#" data-toggle="modal" data-target="#myModal20" class="offer-img">
                        <img src="{{asset('front/images/of19.png')}}" class="img-responsive" alt="">
                    </a>
                    <div class="mid-1">
                        <div class="women">
                            <h6><a href="single.html">Grapes</a>(500 g)</h6>
                        </div>
                        <div class="mid-2">
                            <p><label>$1.00</label><em class="item_price">$0.80</em></p>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="add">
                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1"
                                data-summary="summary 1" data-price="0.80" data-quantity="1"
                                data-image="{{asset('front/images/of19.png')}}">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 pro-1">
                <div class="col-m">
                    <a href="#" data-toggle="modal" data-target="#myModal21" class="offer-img">
                        <img src="{{asset('front/images/of20.png')}}" class="img-responsive" alt="">
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
                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1"
                                data-summary="summary 1" data-price="6.00" data-quantity="1"
                                data-image="{{asset('front/images/of20.png')}}">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pro-1">
                <div class="col-m">
                    <a href="#" data-toggle="modal" data-target="#myModal22" class="offer-img">
                        <img src="{{asset('front/images/of21.png')}}" class="img-responsive" alt="">
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
                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1"
                                data-summary="summary 1" data-price="4.50" data-quantity="1"
                                data-image="{{asset('front/images/of21.png')}}">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pro-1">
                <div class="col-m">
                    <a href="#" data-toggle="modal" data-target="#myModal23" class="offer-img">
                        <img src="{{asset('front/images/of22.png')}}" class="img-responsive" alt="">
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
                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1"
                                data-summary="summary 1" data-price="3.50" data-quantity="1"
                                data-image="{{asset('front/images/of22.png')}}">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 pro-1">
                <div class="col-m">
                    <a href="#" data-toggle="modal" data-target="#myModal24" class="offer-img">
                        <img src="{{asset('front/images/of23.png')}}" class="img-responsive" alt="">
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
                            <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1"
                                data-summary="summary 1" data-price="0.80" data-quantity="1"
                                data-image="{{asset('front/images/of23.png')}}">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@endsection
