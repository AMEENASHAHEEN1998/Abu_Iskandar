@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/neighborhood.neighborhood') }}
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






                    <a href="{{ route('admin.neighborhood.create') }}" class="btn btn-success" data-toggle="modal"
                        data-target="#exampleModal">
                        {{ trans('admin/neighborhood.addneighborhood') }}
                    </a>



                    <br><br>
                    <h1>{{ trans('admin/neighborhood.neighborhood') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin/neighborhood.name') }}</th>
                                    <th>{{ trans('admin/city.name') }}</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $lng = app()->getLocale();
                                ?>

                                @foreach ($neighborhoods as $neighborhood)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $neighborhood->name }}</td>
                                        <td>{{ $neighborhood->City->name }}</td>



                                        <td>
                                            {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#exampleModaledit{{ $car->id }}"
                                                title="{{ trans('admin/car.edit') }}"><i
                                                    class="fa fa-edit"></i></button> --}}


                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $neighborhood->id }}"
                                                title="{{ trans('admin/neighborhood.delete') }}"><i
                                                    class="fa fa-trash"></i></button>

                                        </td>
                                    </tr>

                                    <!-- edit_modal_car -->

                                    {{-- <div class="modal fade" id="exampleModaledit{{ $car->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/car.update') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form
                                                        action="{{ route('admin.car.update', $car->id) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <input type="hidden" name="user_id"
                                                            value="{{ auth()->user()->id }}">

                                                        <div class="row">


                                                            <div class="col">
                                                                <label for="Name"
                                                                    class="mr-sm-2">{{ trans('admin/car.name_ar') }}
                                                                    :</label>
                                                                <input id="Name" type="text" name="name_ar"
                                                                    value="{{ $car->name_ar }}"
                                                                    class="form-control">
                                                            </div>


                                                            <div class="col">
                                                                <label for="Name_en"
                                                                    class="mr-sm-2">{{ trans('admin/car.name_en') }}
                                                                    :</label>
                                                                <input type="text" class="form-control" name="name_en"
                                                                    value="{{ $car->name_en }}" required>
                                                            </div>


                                                        </div>


                                                        <div class="modal-footer">





                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('admin/car.close') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">{{ trans('admin/car.update') }}</button>
                                                            </div>

                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                      </div> --}}


                                        <!-- edit_modal_car -->

                                        <!-- delete_modal_car -->
                                           <!-- delete_modal_Category -->
                                    <div class="modal fade" id="delete{{ $neighborhood->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/neighborhood.delete_neighborhood') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('admin.neighborhood.destroy',$neighborhood->id)}}" method="post">
                                                        {{method_field('Delete')}}
                                                        @csrf
                                                        {{ trans('admin/neighborhood.warning_neighborhood') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $neighborhood->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('admin/neighborhood.close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-danger">{{ trans('admin/neighborhood.delete') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- delete_modal_neighborhood-->



                                @endforeach

                        </table>

                        {{$neighborhoods->links()}}

                    </div>



{{-- add --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        {{ trans('admin/neighborhood.addneighborhood') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('admin.neighborhood.store') }}" method="POST">
                                        @csrf

                                        {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}

                                        <div class="row">


                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('admin/neighborhood.name') }}
                                                    :</label>
                                                <input id="Name" type="text" name="name" class="form-control" required>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>





                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="name"
                                                        class="mr-sm-2">{{ trans('admin/city.name') }}
                                                    :</label>

                                                <div class="box ">
                                                    <select class="form-control form-selected" style="height: 50px" name="city" required>
                                                        <option value=""></option>

                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->name }}</option>

                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="modal-footer">





                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('admin/neighborhood.close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-success">{{ trans('admin/neighborhood.submit') }}</button>
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
