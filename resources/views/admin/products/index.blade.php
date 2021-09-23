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
    {{-- @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('update'))
      <div class="alert alert-info">{{ session('update') }}</div>
    @endif
    @if (session('delete'))
      <div class="alert alert-danger">{{ session('delete') }}</div>
    @endif --}}

    @include('sweetalert::alert')

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


                <a class="btn btn-primary btn-sm" href="{{ route('admin.products.create') }}">{{trans('admin/products.add_product')}}</a>
                <br>
                <br>

                <form action="{{route('admin.findProduct')}}" method="GET">

                    <div class="row" >
                        <div class="col-4">
                            <div class="form-group">
                                <input type="text" class="form-control search" name="query"
                                        placeholder=" البحث"
                                        value="{{ request()->input('query') }}">
                                <span class="text-danger">@error('query'){{ $message }} @enderror</span>
                             </div>

                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">البحث</button>
                               </div>
                        </div>
                    </div>
                 </form>
                <br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                           data-page-length="50"
                           >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('admin/products.product_name') }}</th>

                            <th>{{ trans('admin/products.product_category') }}</th>
                            <th>{{ trans('admin/products.product_image') }}</th>
                            <th>{{ trans('admin/products.decription') }}</th>
                            <th>{{ trans('admin/products.user_add') }}</th>
                            <th>{{ trans('admin/products.views_number') }}</th>
                            <th>{{ trans('admin/products.process') }}</th>

                        </tr>
                        </thead>
                        <tbody>

                            <?php $i = 0; ?>

                         @foreach ($Products as $Product)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                @if (App::getLocale() == 'en')
                                <td>{{ $Product->product_name_en }}</td>

                                <td>{{ ($Product->category) ? $Product->category->category_name_en : 'Uncategories' }}</td>
                                @else

                                <td>{{ $Product->product_name_ar }}</td>

                                <td>{{ ($Product->category) ? $Product->category->category_name_ar : 'غير مصنف' }}</td>
                                @endif
                                <td> <img src="{{asset('uploads/'.$Product->image)}}" width="70px" height="60px"></td>
                                <td>{{ $Product->decription}}</td>
                                <td>{{ (($Product->User)?$Product->User->name:"غير معرف") }}</td>
                                <td>{{ $Product->views }}</td>



                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $Product->id }}"
                                    title="{{ trans('admin/products.edit') }}"><i
                                    class="fa fa-edit"></i></button>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $Product->id }}"
                                    title="{{ trans('admin/products.delete') }}"><i
                                    class="fa fa-trash"></i></button>




                                </td>
                            </tr>


                           <!-- edit_modal_Product -->
                            <div class="modal fade" id="edit{{ $Product->id }}" tabindex="-1" role="dialog"
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
                                           <form action="{{route('admin.products.update' , $Product->id ) }}" method="post" enctype="multipart/form-data">
                                               {{method_field('patch')}}
                                               @csrf
                                              <div class="card-body">


                                                <div class="row">

                                                    <div class="col">
                                                        <label for="product_name_ar"
                                                                class="mr-sm-2">{{ trans('admin/products.product_name_ar') }}
                                                            :</label>
                                                        <input id="product_name_ar" class="form-control" type="text" value="{{$Product->product_name_ar}}" name="product_name_ar" required />
                                                    </div>


                                                    <div class="col">
                                                        <label for="product_name_en"
                                                                class="mr-sm-2">{{ trans('admin/products.product_name_en') }}
                                                            :</label>
                                                        <input id="product_name_en" class="form-control" type="text" value="{{$Product->product_name_en}}"  name="product_name_en" required />
                                                    </div>

                                                </div>
                                            <div class="row">

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label
                                                    for="exampleFormControlTextarea1">{{ trans('admin/products.product_image') }}
                                                    :</label>
                                                        <input type="file" name="image" class="form-control-file"  id="exampleFormControlFile1">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                <img src="{{asset('uploads/'.$Product->image)}}" width="70px" height="60px">
                                                </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name_en"
                                                                class="mr-sm-2">{{ trans('admin/products.primary_category') }}
                                                            :</label>

                                                        <div class="box col-md-6">
                                                            <select class="form-control " name="category_id" >
                                                                @foreach ($Categories as $Category)
                                                                @if (App::getLocale() == 'en')
                                                                    <option @if($Product->category_id == $Category->id)
                                                                    {{"selected"}}
                                                                    @endif
                                                                     value="{{ $Category->id }}">{{ $Category->category_name_en }}</option>
                                                                @else
                                                                    <option @if($Product->category_id == $Category->id)
                                                                    {{"selected"}}
                                                                    @endif value="{{ $Category->id }}">{{ $Category->category_name_ar }}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>

                                                        <div >
                                                        @foreach(Illuminate\Support\Facades\DB::table('products_subcategories')
                                                        ->where('product_id' , $Product->id)->get() as $product_subcategory)
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Name_en"
                                                                        class="mr-sm-2">{{ trans('admin/products.sub_category') }}
                                                                        :</label>

                                                                    <div class="box ">
                                                                        <select class="form-control " name="sub_category_id" disabled >
                                                                            @foreach ($Subcategories as $Category)
                                                                                @if (App::getLocale() == 'en')
                                                                                    <option
                                                                                        @if($product_subcategory->subcategory_id == $Category->id)
                                                                                            {{"selected"}}
                                                                                        @endif
                                                                                            value="{{ $Category->id }}">{{ $Category->sub_category_name_en }}</option>
                                                                                @else
                                                                                    <option
                                                                                        @if($product_subcategory->subcategory_id == $Category->id)
                                                                                            {{"selected"}}
                                                                                        @endif
                                                                                            value="{{ $Category->id }}">{{ $Category->sub_category_name_ar }}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        @endforeach
                                                        </div>



                                                    <div >

                                                    @foreach(App\Models\price::where('product_id' , $Product->id)->get() as $product_price_size)
                                                        <div class="row">

                                                            <div class="col">
                                                                <label for="product_name_ar"
                                                                    class="mr-sm-2">{{ trans('admin/products.size') }}
                                                                    :</label>
                                                                <input id="product_name_ar" class="form-control" disabled type="text" value="{{$product_price_size->size}}" name="size" required />
                                                            </div>


                                                            <div class="col">
                                                                <label for="product_number"
                                                                    class="mr-sm-2">{{ trans('admin/products.product_number') }}
                                                                    :</label>
                                                                <input id="product_number" class="form-control" disabled type="text" value="{{$product_price_size->product_number}}" name="product_number" required />
                                                            </div>

                                                        </div>


                                                    @endforeach



                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                        <label for="decription"
                                                                class="mr-sm-2">{{ trans('admin/products.decription') }}
                                                            :</label>
                                                        <textarea class="form-control" type="text" name="decription" cols="20" rows="5">
                                                        {{$Product->decription}}
                                                        </textarea>
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



                                <!-- delete_modal_Category -->
                                <div class="modal fade" id="delete{{ $Product->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('admin/products.delete_product') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{route('admin.products.destroy',$Product->id)}}" method="post">
                                                {{method_field('Delete')}}
                                                @csrf
                                                {{ trans('admin/products.warning_category') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $Product->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('admin/products.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('admin/products.delete') }}</button>
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                                </div>



                        @endforeach
                    </table>
                </div>
                {{-- {{ $Products->links() }} --}}
                <div class="d-flex justify-content-center">
                    {!! $Products->links() !!}
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



