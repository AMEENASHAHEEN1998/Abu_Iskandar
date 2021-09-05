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

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>


                        <tbody>
                            <tr>
                                <th scope="row"> {{ trans('admin/requestjob.name') }} </th>
                                <td>{{ $requestjob->name }}</td>

                            </tr>

                            <tr>
                                <th scope="row"> {{ trans('admin/requestjob.phone_number') }}</th>
                                <td>  {{ $requestjob->phone_number }}</td>

                            </tr>

                            <tr>
                                <th scope="row">{{ trans('admin/requestjob.job_id') }}</th>
                                <td> {{ ($requestjob->job) ? $requestjob->job->{'job_name_'.$lng} : trans('admin/dashboard.none_user') }}</td>

                            </tr>


                            <tr>
                                <th scope="row"> {{ trans('admin/requestjob.specialization') }} </th>
                                <td>  {{ $requestjob->specialization }}</td>
                            </tr>

                            <tr>
                                <th scope="row"> {{ trans('admin/requestjob.address') }}</th>
                                <td> {{ $requestjob->address }}</td>
                            </tr>

                            <tr>
                                <th scope="row"> {{ trans('admin/requestjob.Date_of_Birth') }}</th>
                                <td>  {{ $requestjob->Date_of_Birth }}</td>
                            </tr>
                            <tr>
                                <th scope="row"> {{ trans('admin/requestjob.university') }}</th>
                                <td>  {{ $requestjob->university }} </td>
                            </tr>
                            <tr>
                                <th scope="row">{{ trans('admin/requestjob.start_date') }} </th>
                                <td>  {{ $requestjob->start_date }}</td>
                            </tr>

                            <tr>
                                <th scope="row"> {{ trans('admin/requestjob.comment') }} </th>
                                <td> {{ $requestjob->comments_user }} </td>
                            </tr>

                            <tr>
                                <th scope="row">  {{ trans('admin/requestjob.notes') }}</th>
                                <td> {{ $requestjob->comments_admin }} </td>
                            </tr>

                            <tr>
                                <th scope="row"> {{ trans('admin/requestjob.created_at') }}</th>
                                <td> {{ $requestjob->created_at->format('Y-m-d') }} </td>
                            </tr>

                            <tr>
                                <th scope="row"> {{ trans('admin/requestjob.status') }}</th>
                                <td> {{ $requestjob->status }} </td>
                            </tr>

                            <tr>
                                <th scope="row">    {{ trans('admin/requestjob.image') }}</th>
                                <td>   <img src="{{asset('upload/admin/requestjob/'.$requestjob->personal_image)}}" style="width: 85px" alt=""> </td>
                            </tr>








                        </tbody>
                    </table>




                </div>
            </div>
        </div>





    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
