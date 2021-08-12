@extends('admin.layouts.master')
@section('content')



    <!--=================================
             Main content -->
    <!-- main-content -->
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">


                    @include('admin.include.alerts.success')
                    @include('admin.include.alerts.errors')

                    <a href="{{ route('admin.driverrequest.index') }}"  class="btn btn-success"
                       >
                        Back
                    </a>

                    <div>
                        <hr>

                        <h1> {{ trans('admin/driverrequest.detail_order') }}  </h1>

                    </div>

                    <hr>



                    <div>
                        <h3> <i class="fa fa-angellist"></i>   {{ trans('admin/driverrequest.user_name') }}   <strong> : {{ $order->User->name }}</strong></h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>   {{ trans('admin/driverrequest.product_id') }}   <strong> : {{ $order->product_id }}</strong></h3>
                    </div>
                    <hr>
                    <div>
                        <h3> <i class="fa fa-angellist"></i>   {{ trans('admin/driverrequest.price') }}   <strong> : {{ $order->price }}</strong></h3>
                    </div>
                    <hr>
                    <div>
                        <h3> <i class="fa fa-angellist"></i>   {{ trans('admin/driverrequest.size') }}   <strong> : {{ $order->size }}</strong></h3>
                    </div>
                    <hr>
                    <div>
                        <h3> <i class="fa fa-angellist"></i>   {{ trans('admin/driverrequest.status') }}   <strong> : {{ $order->status }}</strong></h3>
                    </div>
                    <hr>





                </div>
            </div>
        </div>





    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
