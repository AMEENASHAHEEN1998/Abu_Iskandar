@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/job.job') }}
@endsection
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

                    <a href="{{ route('admin.job.index') }}" class="btn btn-success">
                        {{ trans('admin/dashboard.Back') }}
                    </a>

                    <hr>
                    <h2>{{ trans('admin/job.add_job') }}</h2>


                    <form action="{{ route('admin.job.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">




                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="formGroupExampleInput">{{ trans('admin/job.job_name_ar') }}</label>
                                    <input type="text" name="job_name_ar" class="form-control"
                                        id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('job_name_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="formGroupExampleInput">{{ trans('admin/job.job_name_en') }}</label>
                                    <input type="text" name="job_name_en" class="form-control"
                                        id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('job_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>




                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('admin/job.description_ar') }}</label>
                                    <input type="text" name="job_description_ar" class="form-control" id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('job_description_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('admin/job.description_en') }}</label>
                                    <input type="text" name="job_description_en" class="form-control" id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('job_description_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ trans('admin/job.image') }}</label>
                            <input type="file" class="form-control" name="image" />
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>










                        <button class="btn btn-success btn-lg">{{ trans('admin/job.save') }}</button>

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
