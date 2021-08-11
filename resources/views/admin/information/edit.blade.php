@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/information.title') }}
@endsection
@section('content')



<!--=================================
 Main content -->
    <!-- main-content -->
<!-- row -->
<div class="row">
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('update'))
      <div class="alert alert-info">{{ session('update') }}</div>
    @endif
    @if (session('delete'))
      <div class="alert alert-danger">{{ session('delete') }}</div>
    @endif
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




                <br><br>

                <div class="table-responsive">



                    <h2>{{ trans('admin/information.edit_information') }}</h2>
                    <br>
                    <form action="{{ route('admin.information.update' , $information->id) }}" method="post" enctype="multipart/form-data">
                        {{method_field('patch')}}
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.company_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" value="{{ $information->company_name_ar }}" name="company_name_ar" class="form-control"  autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.company_name_en') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" value="{{ $information->company_name_en }}" name="company_name_en"   autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.city_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" value="{{ $information->city_ar}}" name="city_name_ar" class="form-control"  autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.city_name_en') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" value="{{ $information->city_en}}" name="city_name_en"  autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.address_ar') }}
                                    :</label>
                                <input id="Name" type="text" value="{{ $information->address_ar }}" name="address_ar" class="form-control"  autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.address_en') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" value="{{ $information->address_en}}" name="address_en"  autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.telephone_number') }}
                                    :</label>
                                <input id="Name" type="text" value="{{ $information->telephone_number}}" name="telephone_number" class="form-control"  autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.phone_number') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" value="{{ $information->phone_number}}" name="phone_number"  autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.email') }}
                                    :</label>
                                <input id="Name" type="text" value="{{ $information->email}}" name="email" class="form-control"  autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.facebook_link') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" value="{{ $information->facebook_link}}" name="facebook_link"  autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.instagram_link') }}
                                    :</label>
                                <input id="Name" type="text" value="{{ $information->instagram_link}}" name="instagram_link" class="form-control"  autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.tweeter_link') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" value="{{ $information->tweeter_link}}" name="tweeter_link"  autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                                    <label
                                for="exampleFormControlTextarea1">{{ trans('admin/information.logo') }}
                                :</label>
                                <input type="file" name="image" class="form-control-file" required id="exampleFormControlFile1">


                        <img src="{{asset('uploads/'.$information->image)}}" width="200px" height="100px">
                        </div>

                        <button type="submit"
                            class="btn btn-success btn-lg">{{ trans('admin/information.submit') }}</button>

                    </form>
                        <br><br>


                </div>

           </div>
        </div>
    </div>







</div>

<!-- row closed -->

        <!--=================================
footer -->


    </div><!-- main content wrapper end-->
</div>
</div>
</div>
@endsection



