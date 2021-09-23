@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/permission.permissions') }}
@endsection
@section('content')



    <!--=================================
                             Main content -->
    <!-- main-content -->
    <!-- row -->
    <div class="row">
        @include('sweetalert::alert')

        {{-- @include('admin.include.alerts.success')
        @include('admin.include.alerts.errors') --}}


        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">


                    <a href="" class="btn btn-success" data-toggle="modal"
                        data-target="#exampleModal">
                        {{ trans('admin/permission.addpermission') }}
                    </a>



                    <br><br>
                    <h1>{{ trans('admin/permission.permissions') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin/permission.name') }}</th>
                                    <th>{{ trans('admin/permission.action') }}</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $lng = app()->getLocale();
                                ?>

                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permission->name }}</td>



                                        <td>



                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $permission->id }}"
                                                title="{{ trans('admin/permission.delete') }}"><i
                                                    class="fa fa-trash"></i></button>

                                        </td>
                                    </tr>


                                    <!-- delete_modal_car -->
                                    <!-- delete_modal_Category -->
                                    <div class="modal fade" id="delete{{ $permission->id }}" tabindex="-1" permission="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" permission="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/permission.delete') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.permission.destroy', $permission->id) }}"
                                                        method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        {{ trans('admin/permission.warning_message') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $permission->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('admin/permission.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('admin/permission.delete') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- delete_modal_permission-->



                                @endforeach

                        </table>

                        {{-- {{ $permission->links() }} --}}

                    </div>



                    {{-- add --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" permission="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" permission="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        {{ trans('admin/permission.addpermission') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('admin.permission.store') }}" method="POST">
                                        @csrf

                                        {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}

                                        <div class="row">


                                            <div class="col">
                                                <label for="Name" class="mr-sm-2">{{ trans('admin/permission.name') }}
                                                    :</label>
                                                <input id="Name" type="text" name="name" class="form-control" required>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>





                                        </div>

                                      


                                        <div class="modal-footer">





                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('admin/permission.close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-success">{{ trans('admin/permission.submit') }}</button>
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
