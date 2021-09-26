@extends('front.layout.layout')
@section('content')
    <div class="banner-top" >

        <div class="container">

            <h3 >{{ trans('front/header.about') }}</h3>
            <h4 ><a href="index.html">Home</a><label>/</label>About</h4>

            <div class="clearfix"> </div>
        </div>
    </div>

    {{-- <video width="320" height="240" controls>
        <source src="{{ asset('front/images/ab.jpg')}}" type="video/mp4">
        <source src="{{ asset('front/images/ab.jpg')}}" type="video/ogg">
      Your browser does not support the video tag.
      </video> --}}
    <!-- faqs -->
    <div class="about-w3 ">


        <!--about-->
        <div class="container" >
           @include('front.layout.aboutcontent')
        </div>
        <!--//about-->

        <!--work-experience-->
        {{-- <div class="work" style="font-family: 'Amiri', serif ;">
            <div class="container">
                <div class="spec spec-w3ls">
                    <h3>Our Journey</h3>
                    <div class="ser-t">
                        <b></b>
                        <span><i></i></span>
                        <b class="line"></b>
                    </div>
                </div>
                <div class="work-info">
                    <div class="col-md-6 work-left">
                        <div class=" work-w3 ">
                            <h5> May 2012</h5>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo </p>
                        </div>
                        <label></label>
                    </div>
                    <div class="col-md-6 work-right">
                        <div class=" work-w31">
                            <h5> November 2012</h5>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo </p>
                        </div>
                        <label></label>
                    </div>
                    <div class="clearfix"> </div>
                    <span> 2012</span>
                </div>
                <div class="work-info">
                    <div class="col-md-6 work-left">
                        <div class=" work-w3 ">
                            <h5> June 2013</h5>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo </p>
                        </div>
                        <label></label>
                    </div>
                    <div class="col-md-6 work-right">
                        <div class=" work-w31">
                            <h5>December 2013</h5>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo </p>
                        </div>
                        <label></label>
                    </div>
                    <div class="clearfix"> </div>
                    <span> 2013</span>
                </div>
                <div class="work-info">
                    <div class="col-md-6 work-left">
                        <div class=" work-w3 ">
                            <h5> April 2014</h5>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo </p>
                        </div>
                        <label></label>
                    </div>
                    <div class="col-md-6 work-right">
                        <div class=" work-w31">
                            <h5> August 2014</h5>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo </p>
                        </div>
                        <label></label>
                    </div>
                    <div class="clearfix"> </div>
                    <span> 2014</span>
                </div>
                <div class="work-info">
                    <div class="col-md-6 work-left">
                        <div class=" work-w3 ">
                            <h5> February 2015</h5>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo </p>
                        </div>
                        <label></label>
                    </div>
                    <div class="col-md-6 work-right">
                        <div class=" work-w31">
                            <h5> July 2015</h5>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo </p>
                        </div>
                        <label></label>
                    </div>
                    <div class="clearfix"> </div>
                    <span> 2015</span>
                    <span class="last"> 2016</span>
                </div>
            </div>
        </div> --}}
        
  


    </div>
    <!-- // Terms of use -->

@endsection
