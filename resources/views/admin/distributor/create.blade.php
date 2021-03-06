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



                    <a href="{{ route('admin.distributor.index') }}" class="btn btn-success">
                        {{ trans('admin/dashboard.Back') }}
                    </a>

                    <hr>
                    <h2>{{ trans('admin/distributor.add_distributor') }}</h2>


                    <form action="{{ route('admin.distributor.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('admin/distributor.name_ar') }}</label>
                                    <input type="text" name="name_ar" class="form-control" id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('name_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('admin/distributor.name_en') }}</label>
                                    <input type="text" name="name_en" class="form-control" id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>





                        {{-- <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="formGroupExampleInput">{{ trans('admin/distributor.distributors_name_ar') }}</label>
                                    <input type="text" name="distributor_name_ar" class="form-control"
                                        id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('distributor_name_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="formGroupExampleInput">{{ trans('admin/distributor.distributors_name_en') }}</label>
                                    <input type="text" name="distributor_name_en" class="form-control"
                                        id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('distributor_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div> --}}


                        <div class="col-md-6">
                            <div class="form-group">
                                <label
                                    for="formGroupExampleInput">{{ trans('admin/distributor.phone_number') }}</label>
                                <input type="text" name="phone_number" class="form-control"
                                    id="formGroupExampleInput">
                            </div>
                        </div>

                        @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror



                        <?php
                        $lng = app()->getLocale();
                       ?>

                        <div class="row">
                            <div class="col">
                                <label for="Name_en"
                                        class="mr-sm-2">{{ trans('admin/distributor.distributors_type') }}
                                    :</label>

                                <div class="box col-md-6">
                                    <select class="form-control form-selected" style="height: 50px" name="distributor_type_id">
                                        <option value=""></option>

                                        @foreach ($distributor_types as $types)
                                            <option value="{{ $types->id }}">{{ $types->{'name_' . $lng} }}</option>

                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="formGroupExampleInput">{{ trans('admin/distributor.place') }}</label>
                                    {{-- <input type="text" name="place" class="form-control"
                                        id="formGroupExampleInput"> --}}
                                        <select class="form-control form-selected" style="height: 50px" name="city_id">
                                            <option value=""></option>

                                            @foreach ($cites as $city)
                                                <option value="{{ $city->id }}">{{ $city->name}}</option>

                                            @endforeach
                                        </select>

                                </div>
                            </div>

                            @error('city_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>



                        <button class="btn btn-success btn-lg">{{ trans('admin/distributor.save') }}</button>

                    </form>



                </div>
            </div>
        </div>



    </div>




    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
