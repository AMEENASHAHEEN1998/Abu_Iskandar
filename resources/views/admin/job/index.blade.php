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
        @include('admin.include.alerts.success')
        @include('admin.include.alerts.errors')

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">




                    <a href="{{ route('admin.job.create') }}"  class="btn btn-success">
                        {{ trans('admin/job.add_job') }}
                    </a>





                    <br><br>
                    <h1>{{ trans('admin/job.job') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>{{ trans('admin/job.id') }}</th>
                                    <th>{{ trans('admin/job.job_name') }}</th>
                                    <th>{{ trans('admin/job.description_job') }}</th>
                                    <th>{{ trans('admin/job.image') }}</th>

                                    <th>{{ trans('admin/job.user_name') }}</th>
                                    <th>{{ trans('admin/job.status') }}</th>
                                    <th>{{ trans('admin/job.views') }}</th>

                                    <th>{{ trans('admin/job.date') }}</th>
                                    <th>{{ trans('admin/job.action') }}</th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $lng = app()->getLocale();
                                ?>

                                @foreach ($jobs as $job)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $job->{'job_name_' . $lng} }}</td>
                                        <td>{{ $job->{'job_description_' . $lng} }}</td>

                                        <td>
                                            <img src="{{asset('upload/admin/job/'.$job->image)}}" style="width: 85px" alt="">
                                        </td>

                                        <td>{{ ($job->user) ? $job->user->name : trans('admin/dashboard.none_user') }}</td>


                                        <td>
                                            @if($job->status_value == 1)
                                                <p style="color: green">{{trans('admin/job.active')}} </p>
                                            @endif
                                            @if($job->status_value == 0)
                                                <p  style="color: red">{{trans('admin/job.noactive')}} </p>
                                            @endif
                                        </td>
                                        <td>{{ $job->views }}</td>


                                        <td>{{ $job->created_at }}</td>


                                        <td>
                                            <a href="{{route('admin.job.show',$job->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('admin.job.edit',$job->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>



                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $job->id }}"
                                                title="{{ trans('admin/job.delete') }}"><i
                                                    class="fa fa-trash"></i></button>




                                        </td>
                                    </tr>



                                        <!-- delete_modal_job -->
                                           <!-- delete_modal_Category -->
                                    <div class="modal fade" id="delete{{ $job->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/job.delete_job') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('admin.job.destroy',$job->id)}}" method="post">
                                                        {{method_field('Delete')}}
                                                        @csrf
                                                        {{ trans('admin/job.warning_job') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $job->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('admin/job.close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-danger">{{ trans('admin/job.delete') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- delete_modal_job -->



                                @endforeach

                        </table>
                        {{$jobs->links()}}
                    </div>




                </div>



            </div>
        </div>









    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
