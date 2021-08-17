@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/distributortype.distributorstype') }}
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






                    <a href="{{ route('admin.distributortype.create') }}" class="btn btn-success" data-toggle="modal"
                        data-target="#exampleModal">
                        {{ trans('admin/distributortype.add_distributor') }}
                    </a>



                    <br><br>
                    <h1>{{ trans('admin/distributortype.distributorstype') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>{{ trans('admin/distributortype.id') }}</th>
                                    <th>{{ trans('admin/distributortype.name') }}</th>


                                    <th>{{ trans('admin/distributortype.add_name') }}</th>
                                    <th>{{ trans('admin/distributortype.date') }}</th>
                                    <th>{{ trans('admin/distributortype.action') }}</th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $lng = app()->getLocale();
                                ?>

                                @foreach ($distributortypes as $distributortype)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $distributortype->{'name_' . $lng} }}</td>


                                        <td>{{ ($distributortype->user) ? $distributortype->user->name : trans('admin/dashboard.none_user') }}</td>
                                        <td>{{ $distributortype->created_at }}</td>


                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#exampleModaledit{{ $distributortype->id }}"
                                                title="{{ trans('admin/distributortype.edit') }}"><i
                                                    class="fa fa-edit"></i></button>



                                            {{-- <form class="d-inline"
                                                action="{{ route('admin.distributortype.destroy', $distributortype->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('are you sure?')"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form> --}}

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $distributortype->id }}"
                                                title="{{ trans('admin/distributortype.delete') }}"><i
                                                    class="fa fa-trash"></i></button>




                                        </td>
                                    </tr>

                                    <!-- edit_modal_distributortype -->

                                    <div class="modal fade" id="exampleModaledit{{ $distributortype->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/distributortype.add_distributor') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form
                                                        action="{{ route('admin.distributortype.update', $distributortype->id) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <input type="hidden" name="user_id"
                                                            value="{{ auth()->user()->id }}">

                                                        <div class="row">


                                                            <div class="col">
                                                                <label for="Name"
                                                                    class="mr-sm-2">{{ trans('admin/distributortype.name_ar') }}
                                                                    :</label>
                                                                <input id="Name" type="text" name="name_ar"
                                                                    value="{{ $distributortype->name_ar }}"
                                                                    class="form-control">
                                                            </div>


                                                            <div class="col">
                                                                <label for="Name_en"
                                                                    class="mr-sm-2">{{ trans('admin/distributortype.name_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control" name="name_en"
                                                                    value="{{ $distributortype->name_en }}" required>
                                                            </div>


                                                        </div>


                                                        <div class="modal-footer">





                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('admin/distributortype.close') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">{{ trans('admin/distributortype.update') }}</button>
                                                            </div>

                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                        <!-- edit_modal_distributortype -->

                                        <!-- delete_modal_distributortype -->
                                           <!-- delete_modal_Category -->
                                    <div class="modal fade" id="delete{{ $distributortype->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/distributortype.delete_distributorstype') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('admin.distributortype.destroy',$distributortype->id)}}" method="post">
                                                        {{method_field('Delete')}}
                                                        @csrf
                                                        {{ trans('admin/distributortype.warning_distributorstype') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $distributortype->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('admin/distributortype.close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-danger">{{ trans('admin/distributortype.delete') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- delete_modal_distributortype -->



                                @endforeach

                        </table>

                        {{$distributortypes->links()}}

                    </div>



{{-- add --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        {{ trans('admin/distributortype.add_distributor') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('admin.distributortype.store') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                        <div class="row">


                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('admin/distributortype.name_ar') }}
                                                    :</label>
                                                <input id="Name" type="text" name="name_ar" class="form-control">
                                            </div>


                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('admin/distributortype.name_en') }}
                                                    :</label>
                                                <input type="text" class="form-control" name="name_en" required>
                                            </div>


                                        </div>


                                        <div class="modal-footer">





                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('admin/distributortype.close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-success">{{ trans('admin/distributortype.submit') }}</button>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>

{{-- add --}}


                </div>



            </div>
        </div>









    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
