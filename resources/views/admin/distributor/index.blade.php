@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/distributor.distributors') }}
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






                    <a href="{{ route('admin.distributor.create') }}"  class="btn btn-success">
                     {{ trans('admin/distributor.add_distributor') }}
                    </a>



                    <br><br>
                    <h1>{{ trans('admin/distributor.distributors') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin/distributor.name') }}</th>
                                    <th>{{ trans('admin/distributor.phone_number') }}</th>

                                    <th>{{ trans('admin/distributor.distributors_type') }}</th>
                                    <th>{{ trans('admin/distributor.place') }}</th>

                                    <th>{{ trans('admin/distributor.add_name') }}</th>
                                    <th>{{ trans('admin/distributor.date') }}</th>
                                    <th>{{ trans('admin/distributor.action') }}</th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $lng = app()->getLocale();
                               ?>

                                @foreach ($distributors as $distributor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $distributor->{'name_' . $lng} }}</td>
                                        <td>{{ $distributor->phone_number }}</td>


                                        <td>{{ ($distributor->DistributorType) ? $distributor->DistributorType->{'name_' . $lng} : trans('admin/dashboard.none_user') }}</td>

                                        <td>{{ $distributor->place}}</td>


                                        <td>{{ ($distributor->user) ? $distributor->user->name : trans('admin/dashboard.none_user') }}</td>


                                        <td>{{ $distributor->created_at->format('d-m-Y')  }}</td>


                                        <td>
                                            {{-- <a href="{{route('admin.distributor.show',$distributor->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> --}}
                                            <a href="{{route('admin.distributor.edit',$distributor->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            {{-- <form class="d-inline" action="{{ route('admin.distributor.destroy', $distributor->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('are you sure?')"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form> --}}


                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $distributor->id }}"
                                            title="{{ trans('admin/distributor.delete') }}"><i
                                                class="fa fa-trash"></i></button>













                                        </td>
                                    </tr>


                                        <!-- delete_modal_distributortype -->
                                           <!-- delete_modal_Category -->
                                           <div class="modal fade" id="delete{{ $distributor->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('admin/distributor.delete_distributors') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('admin.distributor.destroy',$distributor->id)}}" method="post">
                                                            {{method_field('Delete')}}
                                                            @csrf
                                                            {{ trans('admin/distributor.warning_distributors') }}
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                    value="{{ $distributor->id }}">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('admin/distributor.close') }}</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">{{ trans('admin/distributor.delete') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <!-- delete_modal_distributortype -->
                                @endforeach


                        </table>
                        {{$distributors->links()}}

                    </div>
                </div>
            </div>
        </div>





    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
