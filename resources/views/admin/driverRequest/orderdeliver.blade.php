@extends('admin.layouts.master')
@section('title')
{{ trans('admin/dashboard.orders_delivered') }}
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
                    <h2>{{ trans('admin/dashboard.orders_delivered') }}</h2>

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
                                        <td>{{ (($Order->User)?$Order->User->name :"غير معرف")}}</td>
                                        
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
                                        <td style="color:green ; font-weight:bold">{{ $Order->status }}</td>
                                        <td>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $Order->id }}"
                                            title="{{ trans('admin/driverrequest.delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>



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
                    {{ $Orders->links() }}
                </div>
            </div>
        </div>






    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
