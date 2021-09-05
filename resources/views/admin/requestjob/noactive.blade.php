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

        @include('admin.include.alerts.success')
        @include('admin.include.alerts.errors')

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">






                    <br><br>
                    <h1>{{ trans('admin/requestjob.noactiverequestjobs') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin/requestjob.name') }}</th>
                                    <th>{{ trans('admin/requestjob.phone_number') }}</th>
                                    <th>{{ trans('admin/requestjob.specialization') }}</th>
                                    <th>{{ trans('admin/requestjob.address') }}</th>
                                    <th>{{ trans('admin/requestjob.created_st') }}</th>
                                    <th>{{ trans('admin/requestjob.job_id') }}</th>
                                    <th>{{ trans('admin/requestjob.status') }}</th>
                                    <th>{{ trans('admin/requestjob.start_date') }}</th>
                                    <th>{{ trans('admin/requestjob.action') }}</th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $lng = app()->getLocale();
                                ?>

                                @foreach ($requestjob as $requestjobs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>


                                        <td>{{ $requestjobs->name }}</td>
                                        <td>{{ $requestjobs->phone_number}}</td>
                                        <td>{{ $requestjobs->specialization}}</td>
                                        <td>{{ $requestjobs->address}}</td>
                                        <td>{{ $requestjobs->created_at->format('Y-m-d')}}</td>
                                        <td>{{ $requestjobs->job ? $requestjobs->job->{'job_name_' . $lng} : trans('admin/dashboard.none_user') }}</td>

                                        <td>
                                            @if ($requestjobs->status_value == 2)
                                                <p style="color: green"><strong>{{ trans('admin/requestjob.accept') }}</strong>
                                                </p>
                                            @endif
                                            @if ($requestjobs->status_value == 1)
                                                <p style="color:blue"><strong>{{ trans('admin/requestjob.wait') }}</strong>
                                                </p>
                                            @endif
                                            @if ($requestjobs->status_value == 0)
                                                <p style="color: red"><strong>{{ trans('admin/requestjob.noaccept') }}</strong>
                                                </p>
                                            @endif
                                        </td>

                                        <td>{{ $requestjobs->start_date }}</td>


                                        <td class="d-line">
                                            <a href="{{ route('admin.requestjob.show', $requestjobs->id) }}"class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"data-target="#exampleModaledit{{ $requestjobs->id }}">
                                            <i class="fa fa-edit"></i></button>


                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $requestjobs->id }}" title="{{ trans('admin/requestjobs.delete') }}">
                                                <i class="fa fa-trash"></i>
                                            </button>


                                        </td>
                                    </tr>



                                    <!-- edit_modal_distributortype -->

                                    <div class="modal fade" id="exampleModaledit{{ $requestjobs->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/requestjob.updaterequest') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form
                                                        action="{{ route('admin.requestjob.update', $requestjobs->id) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <input type="hidden" name="user_id"
                                                            value="{{ auth()->user()->id }}">

                                                        <div class="row">


                                                            <div class="col">

                                                                <label
                                                                    for="formGroupExampleInput">{{ trans('admin/requestjob.notes') }}</label>
                                                                <input type="text" name="comments_admin" required
                                                                    class="form-control" id="formGroupExampleInput">
                                                            </div>


                                                        </div>


                                                        <div class="col">

                                                            <label
                                                                for="formGroupExampleInput">{{ trans('admin/requestjob.start_date') }}</label>
                                                            <input type="date" name="start_date" class="form-control"
                                                                id="formGroupExampleInput">
                                                        </div>


                                                        <div class="col">
                                                            <label
                                                                for="formGroupExampleInput">{{ trans('admin/requestjob.status') }}</label>

                                                            <div class="box col-md-6">
                                                                <select class="form-control form-selected" style="height: 50px"
                                                                    name="status">

                                                                    {{-- <option value="{{$requestjobs->status_value}}">{{$requestjobs->status}}</option> --}}
                                                                    <option value="0" @if ($requestjobs->status_value == 0) selected @endif>مرفوض</option>
                                                                    <option value="1" @if ($requestjobs->status_value == 1) selected @endif>قيذ الانتظار</option>
                                                                    <option value="2" @if ($requestjobs->status_value == 2) selected @endif>مقبول</option>


                                                                </select>

                                                            </div>

                                                        </div>


                                                </div>


                                                <div class="modal-footer">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('admin/requestjob.close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-success">{{ trans('admin/requestjob.update') }}</button>
                                                    </div>

                                                </div>

                                            </div>



                                            </form>

                                        </div>
                                    </div>
                    </div>
                </div>


                <!-- edit_modal_distributortype -->

                <!-- delete_modal_requestjobs -->
                <!-- delete_modal_Category -->
                <div class="modal fade" id="delete{{ $requestjobs->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/requestjob.delete_job') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('admin.requestjob.destroy',$requestjobs->id)}}" method="post">
                                                        {{method_field('Delete')}}
                                                        @csrf
                                                        {{ trans('admin/requestjob.warning_job') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $requestjobs->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('admin/requestjob.close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-danger">{{ trans('admin/requestjob.delete') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                <!-- delete_modal_requestjobs -->



                @endforeach

                </table>
                {{$requestjob->links()}}
            </div>




        </div>



    </div>
    </div>









    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
