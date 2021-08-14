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



                    <a href="{{ route('admin.employee.create') }}"  class="btn btn-success">
                     {{ trans('admin/dashboard.add_member') }}
                    </a>



                    <br><br>
                    <h1>{{ trans('admin/employee.employee') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>{{ trans('admin/employee.id') }}</th>
                                    <th>{{ trans('admin/employee.employee_name') }}</th>
                                    <th>{{ trans('admin/employee.job_title') }}</th>

                                    <th>{{ trans('admin/employee.image') }}</th>
                                    <th>{{ trans('admin/employee.status') }}</th>
                                    <th>{{ trans('admin/employee.date') }}</th>

                                    <th>{{ trans('admin/employee.action') }}</th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $lng = app()->getLocale();
                               ?>

                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $employee->{'employee_name_' . $lng} }}</td>
                                        <td>{{ $employee->{'job_title_' . $lng} }}</td>
                                        <td>
                                           <img src="{{asset('upload/admin/employee/'.$employee->image)}}" style="width: 85px" alt="">

                                        </td>

                                        <td>{{ $employee->created_at }}</td>

                                        <td>
                                            @if($employee->status_value == 1)
                                                <button  class="btn btn-success">{{trans('admin/offer.active')}} </button>
                                            @endif
                                            @if($employee->status_value == 0)
                                                <button  class="btn btn-danger">{{trans('admin/offer.noactive')}} </button>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{route('admin.employee.show',$employee->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('admin.employee.edit',$employee->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $employee->id }}"
                                            title="{{ trans('admin/employee.delete') }}"><i
                                                class="fa fa-trash"></i></button>








                                        </td>
                                    </tr>

                                      <!-- delete_modal_distributortype -->
                                           <!-- delete_modal_Category -->
                                           <div class="modal fade" id="delete{{ $employee->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('admin/employee.delete_employee') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('admin.employee.destroy',$employee->id)}}" method="post">
                                                            {{method_field('Delete')}}
                                                            @csrf
                                                            {{ trans('admin/employee.warning_employee') }}
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                    value="{{ $employee->id }}">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('admin/employee.close') }}</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">{{ trans('admin/employee.delete') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        <!-- delete_modal_distributortype -->
                                @endforeach

                        </table>

                        {{$employees->links()}}
                    </div>
                </div>
            </div>
        </div>





    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
