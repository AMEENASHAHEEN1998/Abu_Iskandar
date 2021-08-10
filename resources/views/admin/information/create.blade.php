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
                    <h2>{{ trans('admin/information.title') }}</h2>
                    <!-- add_form -->
                    <form action="{{ route('admin.information.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.company_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="company_name_ar" class="form-control" required autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.company_name_en') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" name="company_name_en" required autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.city_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="city_name_ar" class="form-control" required autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.city_name_en') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" name="city_name_en" required autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.address_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="address_ar" class="form-control" required autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.address_en') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" name="address_en" required autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.telephone_number') }}
                                    :</label>
                                <input id="Name" type="text" name="telephone_number" class="form-control" required autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.phone_number') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" name="phone_number" required autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.email') }}
                                    :</label>
                                <input id="Name" type="text" name="email" class="form-control" required autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.facebook_link') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" name="facebook_link" required autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.instagram_link') }}
                                    :</label>
                                <input id="Name" type="text" name="instagram_link" class="form-control" required autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.tweeter_link') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" name="tweeter_link" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">


                                <div class="form-group">
                                    <label
                                for="exampleFormControlTextarea1">{{ trans('admin/information.logo') }}
                                :</label>
                                    <input type="file" name="image" class="form-control-file" required id="exampleFormControlFile1">
                                  </div>
                        </div>


                        <br><br>

                
                    <button type="submit"
                            class="btn btn-success btn-lg">{{ trans('admin/information.submit') }}</button>
                
                </form>
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



