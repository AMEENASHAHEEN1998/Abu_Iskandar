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

                    <a href="{{ route('admin.employee.index') }}" class="btn btn-success">
                        {{ trans('admin/dashboard.Back') }}
                    </a>

                    <hr>
                    <h2>{{ trans('admin/employee.update_employee') }}</h2>


                    <form action="{{ route('admin.employee.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('admin/employee.employee_name_ar') }}</label>
                                    <input type="text" name="employee_name_ar" value="{{$employee->employee_name_ar}}" class="form-control" id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('employee_name_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('admin/employee.employee_name_en') }}</label>
                                    <input type="text" name="employee_name_en" value="{{$employee->employee_name_en}}" class="form-control" id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('employee_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>




                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('admin/employee.job_title_ar') }}</label>
                                <input type="text" name="job_title_ar" value="{{$employee->job_title_ar}}" class="form-control" id="formGroupExampleInput">
                            </div>
                        </div>

                        @error('job_title_ar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('admin/employee.job_title_en') }}</label>
                                <input type="text" name="job_title_en" value="{{$employee->job_title_en}}" class="form-control" id="formGroupExampleInput">
                            </div>
                        </div>

                        @error('job_title_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>




                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ trans('admin/employee.image') }}</label>
                            <input type="file" class="form-control" name="image" />
                            <img src="{{asset('upload/admin/employee/'.$employee->image)}}" style="width: 150px" alt="">

                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-md-6">

                            <div class="form-group">
                                <input type="checkbox" name="status" class="switchery" data-color="success"
                                     value="{{$employee->status_value}}"  @if($employee->status_value == 1)checked @endif
                                />
                                <label for="switcheryColor4"
                                    class="card-title ml-1">{{ trans('admin/employee.status') }}</label>
                            </div>
                        </div>







                        <button class="btn btn-success btn-lg">{{ trans('admin/employee.save') }}</button>

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
