<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Big store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Contact :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{asset('front/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="{{asset('front/css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="{{asset('front/js/jquery-1.11.1.min.js')}}"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{asset('front/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/easing.js')}}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="{{asset('front/css/font-awesome.css')}}" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<!--- start-rate---->
<script src="{{asset('front/js/jstarbox.js')}}"></script>
	<link rel="stylesheet" href="{{asset('front/css/jstarbox.css')}}" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					}
				})
			});
		});
		</script>
<!---//End-rate---->

</head>
<body>
<a href="offer.html"><img src="{{asset('front/images/download.png')}}" class="img-head" alt=""></a>
<div class="header">

    <div class="container">

        <div class="logo">
            <h1><a href="index.html"></a>Abu Eskandar</h1>
        </div>

        <div class="head-t">
            <ul class="card">
                <li><a href="login.html"><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
                <li><a href="register.html"><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>

            </ul>
        </div>



        <div class="nav-top">
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
                        <li class=" active"><a href="index.html" class="hyper "><span>Home</span></a></li>

                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle  hyper" data-toggle="dropdown"><span>Products<b
                                        class="caret"></b></span></a>
                            <ul class="dropdown-menu multi">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">

                                            <li><a href="kitchen.html"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Coffee</a></li>
                                            <li><a href="kitchen.html"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Spices and seasonings</a></li>
                                            <li><a href="kitchen.html"> <i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Nuts</a></li>
                                            <li><a href="kitchen.html"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i></a></li>

                                        </ul>

                                    </div>
                                    <div class="col-sm-4">

                                        <ul class="multi-column-dropdown">
                                            <li><a href="kitchen.html"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Breakfast &amp; Cereal</a></li>
                                            <li><a href="kitchen.html"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Snacks</a></li>
                                            <li><a href="kitchen.html"><i class="fa fa-angle-right"
                                                        aria-hidden="true"></i>Spices</a></li>

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



                        <li><a href="codes.html" class="hyper"> <span>Articles</span></a></li>
                        <li><a href="codes.html" class="hyper"> <span>Employment applications</span></a></li>
                        <li><a href="codes.html" class="hyper"> <span>Delivery Points</span></a></li>
                        <li><a href="contact.html" class="hyper"><span>Contact Us</span></a></li>
                    </ul>
                </div>
            </nav>
            <div class="cart">

                <span class="fa fa-shopping-cart my-cart-icon"><span
                        class="badge badge-notify my-cart-badge"></span></span>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
</div>


@yield('content')
<!--footer-->
<div class="footer">
    <div class="container">
        <div class="col-md-3 footer-grid">
            <h3>About Us</h3>
            <p>Nam libero tempore, cum soluta nobis est eligendi
                optio cumque nihil impedit quo minus id quod maxime
                placeat facere possimus.</p>
        </div>
        <div class="col-md-3 footer-grid ">
            <h3>Menu</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="kitchen.html">Kitchen</a></li>
                <li><a href="care.html">Personal Care</a></li>
                <li><a href="hold.html">Household</a></li>
                <li><a href="codes.html">Short Codes</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div class="col-md-3 footer-grid ">
            <h3>Customer Services</h3>
            <ul>
                <li><a href="shipping.html">Shipping</a></li>
                <li><a href="terms.html">Terms & Conditions</a></li>
                <li><a href="faqs.html">Faqs</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="offer.html">Online Shopping</a></li>

            </ul>
        </div>
        <div class="col-md-3 footer-grid">
            <h3>My Account</h3>
            <ul>
                <li><a href="login.html">Login</a></li>
                <li><a href="register.html">Register</a></li>


            </ul>
        </div>
        <div class="clearfix"></div>

        <div class="copy-right">
            <p> &copy; 2016 Big store. All Rights Reserved | Design by <a href="http://w3layouts.com/">
                    W3layouts</a></p>
        </div>
    </div>
</div>
<!-- //footer-->
<!-- tabs -->
<script src="{{asset('front/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion
			width: 'auto', //auto or any width like 600px
			fit: true   // 100% fit in a container
			});
		});
	</script>
<!-- //tabs -->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear'
			};
		*/
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="{{asset('front/js/bootstrap.js')}}"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="{{asset('front/js/jquery.mycart.js')}}"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });
  </script>


</body>
</html>