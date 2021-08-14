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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <a href="{{ route('admin.driverrequest.create') }}"  class="btn btn-success">
                     Create
                    </a>


                    <br><br>
                    <h1>{{ trans('admin/driverrequest.request_driver') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin/driverrequest.sender') }}</th>
                                    <th>{{ trans('admin/driverrequest.primary_category') }}</th>
                                    <th>{{ trans('admin/driverrequest.sub_category') }}</th>
                                    <th>{{ trans('admin/driverrequest.product') }}</th>
                                    <th>{{ trans('admin/driverrequest.number') }}</th>
                                    <th>{{ trans('admin/driverrequest.status') }}</th>
                                    <th>{{ trans('admin/driverrequest.processes') }}</th>

                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($Orders as $Order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $Order->User->name }}</td>
                                        <td>{{ $Order->Category()->category_id }}</td>
                                        <td>{{ $Order->Subcategory()->subcategory_id }}</td>
                                        <td>{{ $Order->Product()->product_id }}</td>
                                        <td>{{ $Order->number }}</td>
                                        <td>{{ $Order->status }}</td>
                                        <td>
                                            <a href="{{route('admin.driverrequest.show',$Order->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('admin.driverrequest.edit',$Order->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $Order->id }}"
                                            title="{{ trans('admin/driverrequest.delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>






                                <!-- delete_modal_Category -->
                                <div class="modal fade" id="delete{{ $Order->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('admin/driverrequest.delete_driverrequest') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{route('admin.driverrequest.destroy',$Order->id)}}" method="post">
                                                {{method_field('Delete')}}
                                                @csrf
                                                {{ trans('admin/driverrequest.warning_category') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $Order->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('admin/driverrequest.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('admin/driverrequest.delete') }}</button>
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                                </div>

                                @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>






    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
