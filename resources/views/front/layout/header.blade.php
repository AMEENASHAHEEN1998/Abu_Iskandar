
<div class=" header">

    <div class="container">
        <div class="logo">
            @include('front.layout.title')
            {{-- <h1><a href="index.html"></a>{{ trans('front/header.title') }}</h1> --}}
            {{-- <h1 ><a href="index.html"><b><br>{{ trans('front/header.title') }}<br></b><span>The Best Supermarket</span></a></h1> --}}

        </div>

        <div class="head-t">
            <ul class="card">

                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                @if ($localeCode != App::getLocale())
                <li class="nav-items"  id="langselectors">
                    <a rel="alternate"  hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
                @endif

                @endforeach
                   <!-- Right Side Of Navbar -->
                   {{-- <ul class="navbar-nav ml-auto"> --}}
                    <!-- Authentication Links -->
                    @guest

                    <li class="{{(request()->routeIs('login')) ? 'auth' : '' }}"><a href="{{ route('login') }}"><i class="fa fa-user"
                        aria-hidden="true"></i>{{ trans('front/header.Login') }}</a></li>

                    @if (Route::has('register'))

                        <li class="{{ (request()->routeIs('register')) ? 'auth' : '' }}">
                            <a href="{{ route('register') }}">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            {{ trans('front/header.Register') }}
                            </a>
                        </li>


                    @endif
                @else
                    <li class="nav-item dropdown" >
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <strong><span><i class="fa fa-user"></i> {{ Auth::user()->name }}</span></strong>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @if (auth()->user()->roles_name  != "مستخدم")
                        <li class="nav-item" ><a href="{{ route('dashboard') }}"> رابط لوحة التحكم </a></li>

                    @endif
                @endguest
            {{-- </ul> --}}


            {{-- <li><a href="{{ route('login') }}"><i class="fa fa-user"
                        aria-hidden="true"></i>{{ trans('front/header.Login') }}</a></li>
            <li><a href="{{ route('register') }}"><i class="fa fa-arrow-right"
                        aria-hidden="true"></i>{{ trans('front/header.Register') }}</a></li> --}}
            </ul>
        </div>


        <div class="nav-top admin-header"  >
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
                        <li class="  @if(Route::currentRouteName() =='AbuEskandar.home') active @endif" ><a href="{{route('AbuEskandar.home')}}"
                                class="hyper"><span>{{ trans('front/header.Home') }}</span></a></li>

                        <li class="dropdown  @if(Route::currentRouteName() =='AbuEskandar.show_category') active @endif" >
                            <a href="#" class="hyper "
                                data-toggle="dropdown"><span>{{ trans('front/header.Products') }}<b
                                        class="caret"></b></span></a>
                            <ul class="dropdown-menu multi">
                                <div class="row">

                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            @foreach ($Categories as $Category  )
                                            @if ($loop->iteration <= 4)
                                            <li><a href="{{ route('AbuEskandar.show_category' , $Category->category_name_en) }}">
                                                <i class="fab fa-battle-net"></i>
                                                @if (App::getLocale() == 'en')

                                                    {{ $Category->category_name_en }}
                                                    @else
                                                    {{ $Category->category_name_ar }}
                                                    @endif</a>
                                            </li>
                                            @endif
                                            @endforeach

                                        </ul>

                                    </div>

                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            @foreach ($Categories as $Category  )
                                            @if ($loop->iteration > 4)
                                            <li><a href="{{ route('AbuEskandar.show_category' , $Category->category_name_en) }}">
                                                <i class="fab fa-battle-net"></i>
                                                    @if (App::getLocale() == 'en')

                                                    {{ $Category->category_name_en }}
                                                    @else
                                                    {{ $Category->category_name_ar }}
                                                    @endif
                                                </a>
                                            </li>
                                            @endif
                                            @endforeach

                                        </ul>

                                    </div>






                                    <div class="col-sm-3 w3l">
                                    <a href="#"><img src="{{asset('front/images/me.png')}}" class="img-responsive"
                                            alt=""></a>
                                </div>
                                    <div class="clearfix"></div>

                                </div>
                            </ul>

                        </li>

                        <li class="  @if(Route::currentRouteName() =='AbuEskandar.offer') active @endif" ><a href="{{route('AbuEskandar.offer')}}" class="hyper">
                            <span>{{ trans('front/header.Offer') }}</span></a></li>

                        <li class="  @if(Route::currentRouteName() =='AbuEskandar.articles') active @endif" ><a href="{{route('AbuEskandar.articles')}}" class="hyper">
                                <span>{{ trans('front/header.Articles') }}</span></a></li>

                        <li class="  @if(Route::currentRouteName() =='AbuEskandar.Employment_applications') active @endif" ><a href="{{route('AbuEskandar.Employment_applications')}}" class="hyper">
                                <span>{{ trans('front/header.Employment_applications') }}</span></a></li>
                        <li class="  @if(Route::currentRouteName() =='AbuEskandar.distributor') active @endif" ><a href="{{route('AbuEskandar.distributor')}}" class="hyper">

                            <span>{{ trans('front/header.Delivery_Points') }}
                            </span>
                        </a></li>


                        <li class="  @if(Route::currentRouteName() =='AbuEskandar.about') active @endif" ><a href="{{route('AbuEskandar.about')}}" class="hyper">
                            <span>
                                  {{ trans('front/header.about') }}
                            </span>
                        </a></li>

                        <li class="  @if(Route::currentRouteName() =='AbuEskandar.contact') active @endif" ><a href="{{route('AbuEskandar.contact')}}"
                        class="hyper"><span>{{ trans('front/header.Contact_Us') }}</span></a></li>
                    </ul>
                </div>
            </nav>

        </div>
        {{-- <div class="clearfix"></div> --}}

        <div class="cart">


        </div>
        {{-- <div class="clearfix"></div> --}}

    </div>
</div>

