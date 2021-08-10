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
                    <h2>{{ trans('admin/dashboard.add_offer') }}</h2>


                    <form action="{{ route('admin.offer.store') }}" method="POST">

                        @csrf
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">


                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('admin/offer.offer_title') }}</label>
                                <input type="text" name="offer_title" class="form-control" id="formGroupExampleInput">
                            </div>
                        </div>

                        @error('offer_title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('admin/offer.description') }}</label>
                                <input type="text" name="description" class="form-control" id="formGroupExampleInput">
                            </div>
                        </div>

                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('admin/offer.price') }}</label>
                                <input type="number" name="price" class="form-control" id="formGroupExampleInput">
                            </div>
                        </div>
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                        <div class="col-md-8">

                            <div class="form-group">
                                <input type="checkbox" name="status" class="switchery" data-color="success"
                                    value="1"
                                />
                                <label for="switcheryColor4"
                                    class="card-title ml-1">{{ trans('admin/offer.status') }}</label>
                            </div>
                        </div>


                        <button class="btn btn-success btn-lg">{{ trans('admin/offer.save') }}</button>

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
