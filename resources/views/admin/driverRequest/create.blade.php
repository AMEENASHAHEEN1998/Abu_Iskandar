@extends('admin.layouts.master')
@section('title')
{{ trans('admin/driverrequest.add_request') }}
@endsection
@section('content')

<main class="page-content">

<section class="section-50 section-sm-top-90 section-sm-bottom-100 bg-image-6">
    <div class="shell text-center">
      <h3>Our Menu</h3>
      <div class="range range-xs-center">

        <div class="row">

            <div class="col-md-4">
                <div class="menu-variant-1"><img src="{{asset('upload/admin/driverRequest/sushi-7-310x260.png')}}" alt="" width="310" height="260" class="img-responsive reveal-inline-block"/>
                  <div class="caption">
                    <h5 class="title"><a href="menu-single.html" class="link-white">Sushi</a></h5>
                  </div>
                </div>
              </div>
      
              <div class="col-md-4 offset-top-50 offset-sm-top-0">
                <div class="menu-variant-1"><img src="{{asset('upload/admin/driverRequest/sushi-7-310x260.png')}}" alt="" width="310" height="260" class="img-responsive reveal-inline-block"/>
                  <div class="caption">
                    <h5 class="title"><a href="menu-single.html" class="link-white">Burgers</a></h5>
                  </div>
                </div>
              </div>
      
      
              
              <div class="col-md-4 offset-top-50 offset-md-top-0">
                <div class="menu-variant-1"><img src="{{asset('upload/admin/driverRequest/sushi-7-310x260.png')}}" alt="" width="310" height="260" class="img-responsive reveal-inline-block"/>
                  <div class="caption">
                    <h5 class="title"><a href="menu-single.html" class="link-white">Pizzas</a></h5>
                  </div>
                </div>
              </div>
              <div class="col-md-4 offset-top-50">
                <div class="menu-variant-1"><img src="{{asset('upload/admin/driverRequest/sushi-7-310x260.png')}}" alt="" width="310" height="260" class="img-responsive reveal-inline-block"/>
                  <div class="caption">
                    <h5 class="title"><a href="menu-single.html" class="link-white">Barbecue</a></h5>
                  </div>
                </div>
              </div>
              <div class="col-md-4 offset-top-50">
                <div class="menu-variant-1"><img src="{{asset('upload/admin/driverRequest/sushi-7-310x260.png')}}" alt="" width="310" height="260" class="img-responsive reveal-inline-block"/>
                  <div class="caption">
                    <h5 class="title"><a href="menu-single.html" class="link-white">Sandwiches</a></h5>
                  </div>
                </div>
              </div>
              <div class="col-md-4 offset-top-50">
                <div class="menu-variant-1"><img src="{{asset('upload/admin/driverRequest/sushi-7-310x260.png')}}" alt="" width="310" height="260" class="img-responsive reveal-inline-block"/>
                  <div class="caption">
                    <h5 class="title"><a href="menu-single.html" class="link-white">Tacos</a></h5>
                  </div>
                </div>
              </div>
        </div>
      
      </div>
    </div>
</section>
</main>



@endsection

@section('js')
    
@endsection



