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

                    <a href="{{ route('admin.distributor.index') }}" class="btn btn-success">
                        {{ trans('admin/dashboard.Back') }}
                    </a>

                    <hr>
                    <h2>{{ trans('admin/distributor.update_distributors') }}</h2>

                    <?php
                    $lng = app()->getLocale();
                    ?>
                    <form action="{{ route('admin.distributor.update',$distributor->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('admin/distributor.name_ar') }}</label>
                                    <input type="text" name="name_ar" value="{{ $distributor->name_ar }}" class="form-control" id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('name_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('admin/distributor.name_en') }}</label>
                                    <input type="text" name="name_en" value="{{ $distributor->name_en }}" class="form-control"  id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>





                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="formGroupExampleInput">{{ trans('admin/distributor.distributors_name_ar') }}</label>
                                    <input type="text" name="distributor_name_ar" value="{{ $distributor->distributor_name_ar }}"  class="form-control"
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
                                    <input type="text" name="distributor_name_en" value="{{ $distributor->distributor_name_en }}"  class="form-control"
                                        id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('distributor_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('admin/distributor.phone_number') }}</label>
                                <input type="text" name="phone_number" value="{{ $distributor->phone_number }}"  class="form-control" id="formGroupExampleInput">
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
                                <label for="Name_en" class="mr-sm-2">{{ trans('admin/distributor.distributors_type') }}
                                    :</label>

                                <div class="box col-md-6">
                                    <select class="form-control form-selected" style="height: 50px"
                                        name="distributor_type_id">
                                        <option value=""></option>

                                        @foreach ($distributor_types as $types)
                                            <option value="{{ $types->id }}" @if ($types->id == $distributor->distributor_type_id) selected @endif>{{ $types->{'name_' . $lng} }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
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
