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
                        {{ trans('admin/job.back') }}

                    </a>

                    <div>
                        <hr>

                        <h1> {{ trans('admin/job.detail_job') }} </h1>

                    </div>

                    <hr>

                    <?php
                    $lng = app()->getLocale();
                    ?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>


                        <tbody>
                            <tr>
                                <th scope="row"> {{ trans('admin/job.job_name') }} </th>
                                <td>{{ $job->{'job_name_' . $lng} }}</td>

                            </tr>



                            <tr>
                                <th scope="row"> {{ trans('admin/job.description') }}</th>
                                <td> {{ $job->{'job_description_' . $lng} }}</td>

                            </tr>



                            <tr>
                                <th scope="row"> {{ trans('admin/job.status') }}</th>
                                <td> {{ $job->status }}</td>

                            </tr>

                            <tr>
                                <th scope="row"> {{ trans('admin/job.views') }}</th>
                                <td> {{ $job->views }}</td>

                            </tr>


                            <tr>
                                <th scope="row"> {{ trans('admin/job.user_name') }}</th>
                                <td> {{ $job->user->name }}</td>

                            </tr>

                            <tr>
                                <th scope="row"> {{ trans('admin/job.image') }}</th>
                                <td>
                                    <img src="{{ asset('upload/admin/job/' . $job->image) }}" style="width: 85px" alt="">
                                </td>

                            </tr>






                        </tbody>
                    </table>




                    <hr>


                </div>
            </div>
        </div>





    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
