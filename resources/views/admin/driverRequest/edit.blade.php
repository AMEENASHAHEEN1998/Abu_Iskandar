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
                    <h2>{{ trans('admin/driverrequest.edit_order') }}</h2>

                    <a href="{{ route('admin.driverrequest.index') }}"  class="btn btn-success"
                       >
                        Back
                    </a>


                    <form action="{{ route('admin.driverrequest.update',$order->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">


                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('admin/driverrequest.user_name') }}</label>
                                <input type="text" name="user_id" value="{{$order->User->name}}" class="form-control" id="formGroupExampleInput">
                            </div>
                        </div>

                        @error('user_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('admin/driverrequest.product_id') }}</label>
                                <input type="text" name="product_id"  value="{{$order->product_id}}"class="form-control" id="formGroupExampleInput">
                            </div>
                        </div>

                        @error('product_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror



                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('admin/driverrequest.size') }}</label>
                                <input type="number" name="size" value="{{$order->size}}" class="form-control" id="formGroupExampleInput">
                            </div>
                        </div>
                        @error('size')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('admin/driverrequest.price') }}</label>
                                <input type="number" name="price" value="{{$order->price}}" class="form-control" id="formGroupExampleInput">
                            </div>
                        </div>
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('admin/driverrequest.number') }}</label>
                                <input type="number" name="number" value="{{$order->number}}" class="form-control" id="formGroupExampleInput">
                            </div>
                        </div>
                        @error('number')
                        <span class="text-danger">{{$message}}</span>
                        @enderror




                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="checkbox" name="status" class="switchery" data-color="success"
                                     value="{{$order->status}}"  @if($order->status == 1)checked @endif
                                />
                                <label for="switcheryColor4"
                                    class="card-title ml-1">{{ trans('admin/driverrequest.status') }}</label>
                            </div>
                        </div>


                        <button class="btn btn-success btn-lg">{{ trans('admin/driverrequest.update') }}</button>

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
