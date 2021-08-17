@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/requestjob.requestjobs') }}
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

                    <a href="{{ route('admin.requestjob.index') }}" class="btn btn-success">
                        {{ trans('admin/requestjob.Back') }}

                    </a>

                    <div>
                        <hr>

                        <h1> {{ trans('admin/requestjob.detail_request') }} </h1>

                    </div>

                    <hr>

                    <?php
                    $lng = app()->getLocale();
                    ?>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/requestjob.name') }}
                            <strong> : {{ $requestjob->name }}</strong>
                        </h3>
                    </div>
                    <hr>


                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/requestjob.phone_number') }}
                            <strong> : {{ $requestjob->phone_number }}</strong>
                        </h3>
                    </div>
                    <hr>


                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/requestjob.job_id') }}
                            <strong> : {{ ($requestjob->job) ? $requestjob->job->{'job_name_'.$lng} : trans('admin/dashboard.none_user') }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/requestjob.specialization') }}
                            <strong> : {{ $requestjob->specialization }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/requestjob.address') }}
                            <strong> : {{ $requestjob->address }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/requestjob.Date_of_Birth') }}
                            <strong> : {{ $requestjob->Date_of_Birth }}</strong>
                        </h3>
                    </div>
                    <hr>



                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/requestjob.university') }}
                            <strong> : {{ $requestjob->university }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/requestjob.start_date') }}
                            <strong> : {{ $requestjob->start_date }}</strong>
                        </h3>
                    </div>
                    <hr>


                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/requestjob.comment') }}
                            <strong> : {{ $requestjob->comments_user }}</strong>
                        </h3>
                    </div>
                    <hr>


                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/requestjob.notes') }}
                            <strong> : {{ $requestjob->comments_admin }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/requestjob.status') }}
                            <strong> : {{ $requestjob->status }}</strong>
                        </h3>
                    </div>
                    <hr>






                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/requestjob.image') }}
                            <strong> :
                                <img src="{{asset('upload/admin/requestjob/'.$requestjob->personal_image)}}" style="width: 150px" alt="">
                            </strong>
                        </h3>




                    <hr>


                </div>
            </div>
        </div>





    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
