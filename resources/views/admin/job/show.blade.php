@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/job.job') }}
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

                    <a href="{{ route('admin.job.index') }}" class="btn btn-success">
                        {{ trans('admin/job.Back') }}

                    </a>

                    <div>
                        <hr>

                        <h1> {{ trans('admin/job.detail_job') }} </h1>

                    </div>

                    <hr>

                    <?php
                    $lng = app()->getLocale();
                    ?>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/job.job_name') }}
                            <strong> : {{ $job->{'job_name_' . $lng} }}</strong>
                        </h3>
                    </div>
                    <hr>


                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/job.description') }}
                            <strong> : {{ $job->{'job_description_' . $lng} }}</strong>
                        </h3>
                    </div>
                    <hr>


                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/job.status') }}
                            <strong> : {{ $job->status }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/job.views') }}
                            <strong> : {{ $job->views }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/job.user_name') }}
                            <strong> : {{ $job->user->name }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/job.image') }}
                            <strong> :
                                <img src="{{asset('upload/admin/job/'.$job->image)}}" style="width: 150px" alt="">
                            </strong>
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
