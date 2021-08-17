@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/products.title') }}
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

                <h2>{{ trans('admin/products.add_new_product') }}</h2>

                <form class=" row mb-30" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">


                        <div class="row">

                            <div class="col">
                                <label for="product_name_ar"
                                        class="mr-sm-2">{{ trans('admin/products.product_name_ar') }}
                                    :</label>
                                <input id="product_name_ar" class="form-control" type="text" name="product_name_ar" required />
                            </div>


                            <div class="col">
                                <label for="product_name_en"
                                        class="mr-sm-2">{{ trans('admin/products.product_name_en') }}
                                    :</label>
                                <input id="product_name_en" class="form-control" type="text" name="product_name_en" required />
                            </div>

                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label
                            for="exampleFormControlTextarea1">{{ trans('admin/products.product_image') }}
                            :</label>
                                <input type="file" name="image" class="form-control-file" required id="exampleFormControlFile1">
                              </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Name_en"
                                        class="mr-sm-2">{{ trans('admin/products.primary_category') }}
                                    :</label>

                                <div class="box col-md-6">
                                    <select class="form-control form-control-lg " name="category_id">
                                        @foreach ($Categories as $Category)
                                        @if (App::getLocale() == 'en')
                                            <option value="{{ $Category->id }}">{{ $Category->category_name_en }}</option>
                                        @else
                                            <option value="{{ $Category->id }}">{{ $Category->category_name_ar }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="repeater">
                            <div data-repeater-list="List_subcategory">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('admin/products.sub_category') }}
                                                :</label>

                                            <div class="box ">
                                                <select class="form-control form-control-lg" name="sub_category_id">
                                                    @foreach ($Subcategories as $Category)
                                                    @if (App::getLocale() == 'en')
                                                        <option value="{{ $Category->id }}">{{ $Category->sub_category_name_en }}</option>
                                                    @else
                                                        <option value="{{ $Category->id }}">{{ $Category->sub_category_name_ar }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('admin/products.processes') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('admin/products.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                         <div class="row">
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('admin/products.add_subcategory') }}"/>
                                </div>

                            </div>
                        </div>
                        </div>

                        <div class="repeater">
                            <div data-repeater-list="List_size_prise">
                            <div data-repeater-item>
                                <div class="row">

                                    <div class="col">
                                        <label for="product_name_ar"
                                            class="mr-sm-2">{{ trans('admin/products.size') }}
                                            :</label>
                                        <input id="product_name_ar" class="form-control" type="text" name="size" required />
                                    </div>


                                    <div class="col">
                                        <label for="product_name_en"
                                            class="mr-sm-2">{{ trans('admin/products.price') }}
                                            :</label>
                                        <input id="product_name_en" class="form-control" type="text" name="price" required />
                                    </div>
                                    <div class="col">
                                        <label for="Name_en"
                                            class="mr-sm-2">{{ trans('admin/products.processes') }}
                                            :</label>
                                        <input class="btn btn-danger btn-block" data-repeater-delete
                                            type="button" value="{{ trans('admin/products.delete_row') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-20">
                            <div class="col-12">
                                <input class="button" data-repeater-create type="button" value="{{ trans('admin/products.add_size_price') }}"/>
                            </div>

                        </div>
                </div>



                                </div>
                            </div>


                            <div class="modal-footer">

                                <button type="submit"
                                        class="btn btn-success">{{ trans('admin/products.submit') }}</button>

                            </div>

                </form>
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



