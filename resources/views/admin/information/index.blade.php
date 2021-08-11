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
                    @foreach ($information as $information )


                    <h2>{{ trans('admin/information.title') }}</h2>
                    <a class="btn btn-outline-info btn-info btn-sm" href="{{ route('admin.information.edit' , $information->id) }}">{{ trans('admin/information.edit_information') }}</a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#delete{{ $information->id }}"
                        title="{{ trans('admin/information.delete') }}"><i
                        class="fa fa-trash"></i>
                    </button><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.company_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" value="{{ $information->company_name_ar }}" class="form-control" disabled autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.company_name_en') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" value="{{ $information->company_name_en }}"  disabled autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.city_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" value="{{ $information->city_ar}}" class="form-control" disabled autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.city_name_en') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" value="{{ $information->city_en}}" disabled autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.address_ar') }}
                                    :</label>
                                <input id="Name" type="text" value="{{ $information->address_ar }}"class="form-control" disabled autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.address_en') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" value="{{ $information->address_en}}" disabled autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.telephone_number') }}
                                    :</label>
                                <input id="Name" type="text" value="{{ $information->telephone_number}}" class="form-control" disabled autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.phone_number') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" value="{{ $information->phone_number}}" disabled autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.email') }}
                                    :</label>
                                <input id="Name" type="text" value="{{ $information->email}}" class="form-control" disabled autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.facebook_link') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" value="{{ $information->facebook_link}}" disabled autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="Name"
                                       >{{ trans('admin/information.instagram_link') }}
                                    :</label>
                                <input id="Name" type="text" value="{{ $information->instagram_link}}" class="form-control" disabled autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="Name_en"
                                       >{{ trans('admin/information.tweeter_link') }}
                                    :</label>
                                <input id="Name_en" type="text" class="form-control" value="{{ $information->tweeter_link}}" disabled autocomplete="off">
                            </div>
                        </div>

                                    <label
                                for="exampleFormControlTextarea1">{{ trans('admin/information.logo') }}
                                :</label>


                        <img src="{{asset('uploads/'.$information->image)}}" width="200px" height="100px">



                        <br><br>

<!-- delete_modal_Information -->
<div class="modal fade" id="delete{{ $information->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                id="exampleModalLabel">
                {{ trans('admin/information.delete_information') }}
            </h5>
            <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.information.destroy',$information->id)}}" method="post">
                {{method_field('Delete')}}
                @csrf
                {{ trans('admin/information.warning_category') }}
                <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $information->id }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('admin/information.close') }}</button>
                    <button type="submit"
                            class="btn btn-danger">{{ trans('admin/information.delete') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
                        @endforeach
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



