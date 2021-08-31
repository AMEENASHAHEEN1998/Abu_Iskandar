@extends('admin.layouts.master')
@section('title')
{{ trans('admin/driverrequest.request_driver') }}
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

                    <a href="{{ route('admin.driverrequest.create') }}"  class="btn btn-sm btn-success">
                     {{ trans('admin/driverrequest.add_request') }}
                    </a>
                    <a class="modal-effect btn btn-sm btn-primary" href="{{ route('admin.export_request') }}"
                    style="color:white"><i class="fas fa-file-download"></i>&nbsp;تصدير اكسيل</a>


                    <br><br>
                    <h2>{{ trans('admin/driverrequest.request_driver') }}</h2>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin/driverrequest.sender') }}</th>
                                    <th>{{ trans('admin/driverrequest.primary_category') }}</th>
                                    <th>{{ trans('admin/driverrequest.sub_category') }}</th>
                                    <th>{{ trans('admin/driverrequest.product') }}</th>
                                    <th>{{ trans('admin/driverrequest.product_number') }}</th>
                                    <th>{{ trans('admin/driverrequest.number') }}</th>
                                    <th>{{ trans('admin/driverrequest.status') }}</th>
                                    <th>{{ trans('admin/driverrequest.processes') }}</th>

                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($Orders as $Order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $Order->User->name }}</td>
                                        @if (App::getLocale() == 'en')
                                        <td>{{ ($Order->Category) ? $Order->Category->category_name_en : 'Category Deleted' }}</td>
                                        <td>{{ ($Order->SubCategory) ? $Order->SubCategory->sub_category_name_en : 'Sub Category Deleted' }}</td>
                                        <td>{{ ($Order->Product) ? $Order->Product->product_name_en : 'Product Deleted' }}</td>
                                        @else
                                        <td>{{ ($Order->Category) ? $Order->Category->category_name_ar : 'غير مصنف'}}</td>
                                        <td>{{ ($Order->SubCategory) ?  $Order->SubCategory->sub_category_name_ar : 'الفرع غير موجود' }}</td>
                                        <td>{{ ($Order->Product) ? $Order->Product->product_name_ar : 'تم حذف المنتج'   }}</td>
                                        @endif
                                        <td>{{ $Order->Product->product_number }}</td>

                                        <td>{{ $Order->number }}</td>
                                        @if ($Order->status_value == 0)
                                        <td style="color:red ; font-weight:bold">{{ $Order->status }}</td>
                                        @else
                                        <td style="color:green ; font-weight:bold">{{ $Order->status }}</td>

                                        @endif

                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $Order->id }}"
                                            title="{{ trans('admin/driverrequest.edit') }}"><i
                                            class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $Order->id }}"
                                            title="{{ trans('admin/driverrequest.delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>


<!-- edit_modal_Product -->
<div class="modal fade" id="edit{{ $Order->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   {{ trans('admin/products.edit_product') }}
               </h5>
               <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div >
               <!-- add_form -->
               <form action="{{route('admin.driverrequest.update' , $Order->id ) }}" method="post" enctype="multipart/form-data">
                   {{method_field('patch')}}
                   @csrf
                  <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <label for="Name_en"
                                    class="mr-sm-2">{{ trans('admin/driverrequest.primary_category') }}
                                :</label>

                            <div class="box ">
                                <select class="form-control form-control-lg" name="category_id"  onclick="console.log($(this).val())"
                                onchange="console.log('change is firing')">
                                    @foreach ($Categories as $Category)
                                    @if (App::getLocale() == 'en')
                                        <option @if($Order->category_id == $Category->id)
                                            {{"selected"}}
                                            @endif value="{{ $Category->id }}">{{ $Category->category_name_en }}</option>
                                    @else
                                        <option @if($Order->category_id == $Category->id)
                                            {{"selected"}}
                                            @endif value="{{ $Category->id }}">{{ $Category->category_name_ar }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col">
                            <label for="Name_en"
                                class="mr-sm-2">{{ trans('admin/driverrequest.sub_category') }}
                                :</label>

                            <div class="box ">
                                <select class="form-control form-control-lg" name="sub_category_id">
                                    @foreach ($Subcategories as $Category)
                                    @if (App::getLocale() == 'en')
                                        <option @if($Order->subcategory_id == $Category->id)
                                            {{"selected"}}
                                            @endif value="{{ $Category->id }}">{{ $Category->sub_category_name_en }}</option>
                                    @else
                                        <option @if($Order->subcategory_id == $Category->id)
                                            {{"selected"}}
                                            @endif value="{{ $Category->id }}">{{ $Category->sub_category_name_ar }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="product"
                                    class="mr-sm-2">{{ trans('admin/driverrequest.product') }}
                                :</label> {{ ($Order->Product) ? $Order->Product->product_name_ar : 'تم حذف المنتج'   }}


                                <select class="form-control form-control-lg" id="product" name="product">

                                </select>



                        </div>


                        <div class="col">
                            <label for="number"
                                    class="mr-sm-2">{{ trans('admin/driverrequest.number') }}
                                :</label>
                            <input id="number" class="form-control form-control-lg" type="text" value="{{ $Order->number }}" name="number" required />
                        </div>

                    </div>


                </div>
            </div>





            <div class="modal-footer">

                <button type="submit"
                        class="btn btn-success">{{ trans('admin/driverrequest.submit') }}</button>

            </div>
               </form>

           </div>
       </div>
   </div>
</div>



                                <!-- delete_modal_Category -->
                                <div class="modal fade" id="delete{{ $Order->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('admin/driverrequest.delete_driverrequest') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{route('admin.driverrequest.destroy',$Order->id)}}" method="post">
                                                {{method_field('Delete')}}
                                                @csrf
                                                {{ trans('admin/driverrequest.warning_category') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $Order->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('admin/driverrequest.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('admin/driverrequest.delete') }}</button>
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                                </div>

                                @endforeach

                        </table>
                    </div>

                </div>{{ $Orders->links() }}
            </div>
        </div>






    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('admin/get_products') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="product"]').append('<option value="' +
                                    key + '">' + value + '</option>');

                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

@endsection
