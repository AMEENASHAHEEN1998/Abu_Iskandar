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
                                    <th>{{ trans('admin/distributor.id') }}</th>
                                    <th>{{ trans('admin/distributor.name') }}</th>
                                    <th>{{ trans('admin/distributor.phone_number') }}</th>

                                    <th>{{ trans('admin/distributor.distributors_type') }}</th>

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
                                        <td>{{ $distributor->id }}</td>
                                        <td>{{ $distributor->{'name_' . $lng} }}</td>
                                        <td>{{ $distributor->phone_number }}</td>

                                        <td>
                                            {{-- @if($distributor->DistributorType->{'name_' . $lng != nul}) --}}
                                            {{ $distributor->DistributorType->{'name_' . $lng} }}
                                            {{-- @endif() --}}



                                        </td>

                                        <td>{{ $distributor->user->name }}</td>
                                        <td>{{ $distributor->created_at }}</td>


                                        <td>
                                            <a href="{{route('admin.distributor.show',$distributor->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('admin.distributor.edit',$distributor->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <form class="d-inline" action="{{ route('admin.distributor.destroy', $distributor->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('are you sure?')"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>








                                        </td>
                                    </tr>
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
