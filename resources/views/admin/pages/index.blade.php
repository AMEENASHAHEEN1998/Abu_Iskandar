<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Dashboard</title>
    @include('admin.layouts.head')


</head>

<body>

<div class="wrapper">

    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="assets/images/pre-loader/loader-01.svg" alt="">
    </div>

    <!--=================================
preloader -->

@include('admin.layouts.main-header')

@include('admin.layouts.main-sidebar')

<!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
        <!-- widgets -->
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-danger">

                                        <i class="fa fa-cart-arrow-down highlight-icon" aria-hidden="true"></i>

                                    </span>

                            </div>

                            <div class="float-rights text-right">
                                <p class="card-text text-dark"></p>
                                <h4>{{ trans('admin/dashboard.product_number') }}   <span>
                                    {{$product}}
                                </span></h4>
                            </div>
                        </div>

                        <p class="text-muted pt-3 mb-0 mt-2 border-top  ">
                         <h5 class='d-inline '></h5>
                        </p>

                    </div>




                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">

                                    <span class="text-warning">
                                        <i class="fa fa-tag highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark"></p>
                                <h4>{{ trans('admin/dashboard.offer_number') }} <span>
                                    {{ $offer}}
                                </span></h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-address-card highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark"></p>
                                <h4>{{ trans('admin/dashboard.job_request') }}  <span> {{$requestjob}}</span></h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-primary">

                                        <i class="fa fa-bus highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark"></p>
                                <h4> {{ trans('admin/dashboard.new_order') }}  <span> {{$driverrequest}}</span></h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                         <h5 class='d-inline'></h5>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-md-12 col-lg-12 col-xl-7">
                <div class="card">
                    <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mb-0">{{ trans('admin/dashboard.site_stats') }}</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>

                    </div>
                    <div class="card-body" style="width: 100%">
                        {!! $chartjs_2->render() !!}

                    </div>
                </div>
            </div>


            <div class="col-lg-12 col-xl-5">
                <div class="card">
                    <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mb-0">{{ trans('admin/dashboard.stats_order') }} </h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                    </div>
                    <div class="card-body" style="width: 100%">
                        <br><br><br>

                        {!! $chartjs->render() !!}
<br><br><br>
                    </div>
                </div>

            </div>
        </div>

        {{--<div class="row">

            <div class="col-xl-12 mb-120">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <ul class="list-unstyled">

                            <li class="mb-20">
                                <div class="media">
                                    <div class="position-relative">
                                        <img class="img-fluid mr-15 avatar-small" src="images/item/01.png" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-0"> <span class="float-right text-danger">
                                                    </span> </h6>
                                        <p> </p>
                                    </div>
                                </div>
                                <div class="divider dotted mt-20"></div>
                            </li>



                        </ul>
                    </div>
                </div>
            </div>


        </div> --}}


        <!--=================================
wrapper -->

        <!--=================================
footer -->

        @include('admin/layouts/footer')
    </div><!-- main content wrapper end-->
</div>
</div>
</div>

<!--=================================
footer -->

@include('admin/layouts/footer-scripts')

</body>

</html>
