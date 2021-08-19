
<div class=" header">

    <div class="container">
        <div class="logo">
            @include('front.layout.title')
            {{-- <h1><a href="index.html"></a>{{ trans('front/header.title') }}</h1> --}}
            {{-- <h1 ><a href="index.html"><b><br>{{ trans('front/header.title') }}<br></b><span>The Best Supermarket</span></a></h1> --}}

        </div>

        <div class="head-t">
            <ul class="card">
                <li><a href="{{ route('login') }}"><i class="fa fa-user"
                            aria-hidden="true"></i>{{ trans('front/header.Login') }}</a></li>
                <li><a href="{{ route('register') }}"><i class="fa fa-arrow-right"
                            aria-hidden="true"></i>{{ trans('front/header.Register') }}</a></li>

            </ul>
        </div>


        <div class="nav-top admin-header">
            <nav class="navbar navbar-default">

                <div class="navbar-header nav_2">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                        data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    <ul class="nav navbar-nav ">
                        <li class=" active"><a href="index.html"
                                class="hyper"><span>{{ trans('front/header.Home') }}</span></a></li>

                        <li class="dropdown">
                            <a href="#" class="hyper "
                                data-toggle="dropdown"><span>{{ trans('front/header.Products') }}<b
                                        class="caret"></b></span></a>
                            <ul class="dropdown-menu multi">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">

                                            <li><a href="kitchen.html">
                                                <i class="fab fa-battle-net"></i>
                                                    {{ trans('front/header.coffee') }}
                                                </a>
                                            </li>
                                            <li><a href="kitchen.html">

                                                    {{ trans('front/header.nuts') }}
                                                </a>
                                            </li>
                                            <li><a href="kitchen.html">
                                                <i class="fa fa-angle-left"></i>

                                                    {{ trans('front/header.seasoning') }}
                                                </a>
                                            </li>


                                        </ul>

                                    </div>
                                    <div class="col-sm-4">

                                        <ul class="multi-column-dropdown">
                                            <li><a href="kitchen.html"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>{{ trans('front/header.olive_oil') }}</a>
                                            </li>
                                            <li><a href="kitchen.html"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>{{ trans('front/header.tahini') }}</a>
                                            </li>


                                        </ul>

                                    </div>

                                    <div class="col-sm-3 w3l">
                                    <a href="kitchen.html"><img src="{{asset('front/images/me.png')}}" class="img-responsive"
                                            alt=""></a>
                                </div>
                                    <div class="clearfix"></div>

                                </div>
                            </ul>

                        </li>

                        <li><a href="{{route('AbuEskandar.offer')}}" class="hyper">
                            <span>{{ trans('front/header.Offer') }}</span></a></li>

                        <li><a href="codes.html" class="hyper">
                                <span>{{ trans('front/header.Articles') }}</span></a></li>

                        <li><a href="codes.html" class="hyper">
                                <span>{{ trans('front/header.Employment_applications') }}</span></a></li>
                        <li><a href="codes.html" class="hyper">
                                <span>{{ trans('front/header.Delivery_Points') }}</span></a></li>


                        <li><a href="{{route('AbuEskandar.about')}}" class="hyper">
                            <span>{{ trans('front/header.about') }}</span></a></li>

                        <li><a href="{{route('AbuEskandar.contact')}}"
                        class="hyper"><span>{{ trans('front/header.Contact_Us') }}</span></a></li>
                    </ul>
                </div>
            </nav>

        </div>
        {{-- <div class="clearfix"></div> --}}

        <div class="cart">

            <span class="fa fa-shopping-cart my-cart-icon"></span>
            <span class="badge badge-notify my-cart-badge"></span>
            {{-- </span> --}}
        </div>
        {{-- <div class="clearfix"></div> --}}

    </div>
</div>

