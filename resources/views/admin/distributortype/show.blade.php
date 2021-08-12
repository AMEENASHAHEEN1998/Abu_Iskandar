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

                    <a href="{{ route('admin.distributor.index') }}" class="btn btn-success">
                        {{ trans('admin/distributor.Back') }}

                    </a>

                    <div>
                        <hr>

                        <h1> {{ trans('admin/distributor.detail_distributor') }} </h1>

                    </div>

                    <hr>

                    <?php
                    $lng = app()->getLocale();
                    ?>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/distributor.distributors_name') }}
                            <strong> : {{ $distributor->{'name_' . $lng} }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/distributor.distributors_name') }}
                            <strong> : {{ $distributor->{'distributor_name_' . $lng} }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/distributor.phone_number') }}
                            <strong> : {{ $distributor->phone_number }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/distributor.distributors_type') }}
                            <strong> : {{ $distributor->DistributorType->{'name_' . $lng} }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/distributor.add_name') }}
                            <strong> : {{ $distributor->user->name }}</strong>
                        </h3>
                    </div>
                    <hr>








                    <hr>


                </div>
            </div>
        </div>





    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
