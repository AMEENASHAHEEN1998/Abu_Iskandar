@extends('front.layout.layout')
@section('content')
    <!--banner-->
    {{-- <div class="banner-top">
        <div class="container">
            <h3>{{ trans('front/header.Employment_applications') }}</h3>
            <h4><a
                    href="index.html">{{ trans('front/header.Home') }}</a><label>/</label>{{ trans('front/header.Contact') }}
            </h4>
        </div>
    </div>
    <div class="clearfix"> </div> --}}


    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">



                    <hr>
                    <h2>{{ trans('admin/requestjob.add_requestjob') }}</h2>


                    <form action="{{ route('admin.requestjob.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="job_id" value="{{ $job->id }}">




                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('admin/requestjob.name') }}</label>
                                    <input type="text" name="name" class="form-control" @error('name') is-invalid @enderror "
                                            id=" formGroupExampleInput">

                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="formGroupExampleInput">{{ trans('admin/requestjob.phone_number') }}</label>
                                    <input type="text" name="phone_number" class="form-control" id="formGroupExampleInput">
                                </div>
                                @error('phone_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>




                        </div>


                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="formGroupExampleInput">{{ trans('admin/requestjob.specialization') }}</label>
                                    <input type="text" name="specialization" class="form-control"
                                        id="formGroupExampleInput">
                                </div>
                                @error('specialization')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('admin/requestjob.address') }}</label>
                                    <input type="text" name="address" class="form-control" id="formGroupExampleInput">
                                </div>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>




                        </div>

                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="formGroupExampleInput">{{ trans('admin/requestjob.Date_of_Birth') }}</label>
                                    <input type="date" name="Date_of_Birth" class="form-control" id="formGroupExampleInput">
                                </div>

                                @error('Date_of_Birth')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('admin/requestjob.university') }}</label>
                                    <input type="text" name="university" class="form-control" id="formGroupExampleInput">
                                </div>
                                @error('university')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>




                        </div>
                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('admin/requestjob.comment') }}</label>


                                    <textarea name="comments_user" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                                @error('comment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">{{ trans('admin/requestjob.personal_image') }}</label>
                                <input type="file" name="image" required />
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-success btn-lg">{{ trans('admin/requestjob.save') }}</button>

                    </form>



                </div>
            </div>
        </div>



    </div>



    </div>
    <!-- //contact -->

@endsection
