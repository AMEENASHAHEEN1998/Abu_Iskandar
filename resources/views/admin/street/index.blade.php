@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/street.street') }}
@endsection
@section('content')



    <!--=================================
                             Main content -->
    <!-- main-content -->
    <!-- row -->
    <div class="row">
        @include('sweetalert::alert')

{{-- 
        @include('admin.include.alerts.success')
        @include('admin.include.alerts.errors') --}}


        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">






                    <a href="{{ route('admin.street.create') }}" class="btn btn-success" data-toggle="modal"
                        data-target="#exampleModal">
                        {{ trans('admin/street.addstreet') }}
                    </a>



                    <br><br>
                    <h1>{{ trans('admin/street.street') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin/street.name') }}</th>
                                    <th>{{ trans('admin/neighborhood.name') }}</th>
                                    <th>{{ trans('admin/street.action') }}</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $lng = app()->getLocale();
                                ?>

                                @foreach ($streets as $street)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $street->name }}</td>
                                        <td>{{ $street->Neighborhood->name }}</td>



                                        <td>



                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $street->id }}"
                                                title="{{ trans('admin/street.delete') }}"><i
                                                    class="fa fa-trash"></i></button>

                                        </td>
                                    </tr>


                                    <!-- delete_modal_car -->
                                    <!-- delete_modal_Category -->
                                    <div class="modal fade" id="delete{{ $street->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/street.delete_street') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.street.destroy', $street->id) }}"
                                                        method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        {{ trans('admin/street.warning_street') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $street->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('admin/street.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('admin/street.delete') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- delete_modal_street-->



                                @endforeach

                        </table>

                        {{ $streets->links() }}

                    </div>



                    {{-- add --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        {{ trans('admin/street.addstreet') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('admin.street.store') }}" method="POST">
                                        @csrf

                                        {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}

                                        <div class="row">


                                            <div class="col">
                                                <label for="Name" class="mr-sm-2">{{ trans('admin/street.name') }}
                                                    :</label>
                                                <input id="Name" type="text" name="name" class="form-control" required>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>





                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="name" class="mr-sm-2">{{ trans('admin/neighborhood.name') }}
                                                    :</label>

                                                <div class="box ">
                                                    <select class="form-control form-selected" style="height: 50px"
                                                        name="neighborhood" required>
                                                        <option value=""></option>

                                                        @foreach ($neighborhoods as $neighborhood)
                                                            <option value="{{ $neighborhood->id }}">
                                                                {{ $neighborhood->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="modal-footer">





                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('admin/street.close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-success">{{ trans('admin/street.submit') }}</button>
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
