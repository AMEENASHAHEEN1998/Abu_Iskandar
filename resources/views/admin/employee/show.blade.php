@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/employee.employee') }}
@endsection
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

                    <a href="{{ route('admin.employee.index') }}" class="btn btn-success">
                        Back
                    </a>

                    <div>
                        <hr>

                        <h1> {{ trans('admin/employee.detail_employee') }} </h1>

                    </div>

                    <hr>

                    <?php
                    $lng = app()->getLocale();
                    ?>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/employee.employee_name') }}
                            <strong> : {{ $employee->{'employee_name_' . $lng} }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/employee.job_title') }}
                            <strong> : {{ $employee->{'job_title_' . $lng} }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/employee.image') }}

                        </h3>
                        <img src="{{asset('upload/admin/employee/'.$employee->image)}}" style="width: 150px" alt="">

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
