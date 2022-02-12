@extends('front.layout.layout')

@section('title')
    {{ trans('front/header.Contact') }}
@endsection


@section('content')
    <!--banner-->

    <div class="banner-top">
        <div class="container">
            <h3>{{ trans('front/header.Contact') }}</h3>
            <h4><a href="">{{ trans('front/header.Home') }}</a><label>/</label>{{ trans('front/header.Contact') }}
            </h4>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"> </div>

    <!-- contact -->
    <div class="contact">
        <div class="container">

            <div class="spec ">
                <h3>{{ trans('front/header.Contact') }}</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
            
            <div class=" contact-w3">
                <div class="col-md-5 contact-right">
                    <img src="images/cac.jpg" class="img-responsive" alt="">




                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="500" height="500" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=Al%20Saftawi%20Street,%20opposite%20to%20Abdul%20Bari%20Supermarket%D8%8C%20Gaza&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                href="https://fmovies-online.net"></a><br>


                        </div>
                    </div>

                </div>

                <div class="col-md-7 contact-left">
                    <h4>{{ trans('front/header.Contact_Information') }}</h4>
                    <p>

                    </p>
                    <ul class="contact-list">
                        <li> <i class="fa fa-map-marker" aria-hidden="true"></i>
                            غزة شارع الصفطاوى - مقابل سوبر ماركت عبد الباري
                        </li>
                        <br>
                        <br>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i>
                            <a href="mailto:example@mail.com">
                                m2100036@hotmail.com
                            </a>
                        </li>
                        <br>
                        <br>
                        <li> <i class="fa fa-phone" aria-hidden="true"></i> 0592100038 </li>
                    </ul>
                    <div id="container">
                        <!--Horizontal Tab-->
                        <div id="parentHorizontalTab">

                            <ul class="resp-tabs-list hor_1">
                                <li><i class="fa fa-envelope" aria-hidden="true"></i></li>
                                <li> <i class="fa fa-map-marker" aria-hidden="true"></i> </span></li>
                                <li> <i class="fa fa-phone" aria-hidden="true"></i></li>
                            </ul>

                            <div class="resp-tabs-container hor_1">
                                <div>
                                    <form action="{{ route('AbuEskandar.mail') }}" method="post">
                                        @csrf
                                        <input type="text" value="الاسم" name="Name" onfocus="this.value = '';"
                                            onblur="if (this.value == '') {this.value = 'Name';}" required="">
                                        <input type="email" value="الايميل" name="Email" onfocus="this.value = '';"
                                            onblur="if (this.value == '') {this.value = 'Email';}" required="">
                                        <textarea name="Message" onfocus="this.value = '';"
                                            onblur="if (this.value == '') {this.value = 'Message...';}"
                                            required="">الرسالة ...</textarea>
                                        <input type="submit" value="ارسال">
                                    </form>

                                </div>
                                <div>

                                    <div class="map-grid">
                                        <h5>{{ trans('front/header.branches') }}</h5>
                                        <ul>
                                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i> الفرع الرئيسي : شارع
                                                الصفطاوى.</li>
                                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i>الفرع التاني: غزة -
                                                النصر - مفترق الأمن العام</li>
                                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i>الفرع الثالث: الشارع
                                                الثالث - مفترق الغزالي</li>
                                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i> الفرع الرابع: معسكر
                                                جباليا - الترنس</li>
                                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i> الفرع الخامس: مفترق ابو طلال - بجوار مخبز العائلات
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div>

                                    <div class="map-grid">
                                        <h5>{{ trans('front/header.Contact_Me_Through') }}</h5>
                                        <ul>

                                            <li>رقم الجوال : 0594222074</li>
                                            <li>رقم الجوال : 0594222078</li>
                                            <li>رقم الجوال : 0594222075</li>
                                            <li>رقم الجوال : 0594222076</li>
                                            <li>رقم الجوال : 0594222079</li>


                                            {{-- <li>رق الجوال : 0594222074</li>
                                            <li>رق الجوال : 0594222078</li>
                                            <li>رق الجوال : 0594222075</li>
                                            <li>رق الجوال : 0594222076</li>
                                            <li>رق الجوال : 0594222079</li> --}}



                                        </ul>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>

                    <!--Plug-in Initialisation-->
                    <script type="text/javascript">
                        $(document).ready(function() {
                            //Horizontal Tab
                            $('#parentHorizontalTab').easyResponsiveTabs({
                                type: 'default', //Types: default, vertical, accordion
                                width: 'auto', //auto or any width like 600px
                                fit: true, // 100% fit in a container
                                tabidentify: 'hor_1', // The tab groups identifier
                                activate: function(event) { // Callback function if tab is switched
                                    var $tab = $(this);
                                    var $info = $('#nested-tabInfo');
                                    var $name = $('span', $info);
                                    $name.text($tab.text());
                                    $info.show();
                                }
                            });

                            // Child Tab
                            $('#ChildVerticalTab_1').easyResponsiveTabs({
                                type: 'vertical',
                                width: 'auto',
                                fit: true,
                                tabidentify: 'ver_1', // The tab groups identifier
                                activetab_bg: '#fff', // background color for active tabs in this group
                                inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
                                active_border_color: '#c1c1c1', // border color for active tabs heads in this group
                                active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
                            });

                            //Vertical Tab
                            $('#parentVerticalTab').easyResponsiveTabs({
                                type: 'vertical', //Types: default, vertical, accordion
                                width: 'auto', //auto or any width like 600px
                                fit: true, // 100% fit in a container
                                closed: 'accordion', // Start closed if in accordion view
                                tabidentify: 'hor_1', // The tab groups identifier
                                activate: function(event) { // Callback function if tab is switched
                                    var $tab = $(this);
                                    var $info = $('#nested-tabInfo2');
                                    var $name = $('span', $info);
                                    $name.text($tab.text());
                                    $info.show();
                                }
                            });
                        });
                    </script>

                </div>

                {{-- <div class="clearfix"></div> --}}
            </div>

        </div>
    </div>
    {{-- </div> --}}


    {{-- </div> --}}
    <!-- //contact -->

@endsection


{{-- git config --global user.email up120161676@gmail.com --}}
