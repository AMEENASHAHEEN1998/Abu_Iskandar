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
  

                <a class="btn btn-primary btn-sm" href="{{ route('admin.products.create') }}">{{trans('admin/products.add_product')}}</a>


                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                           data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('admin/products.product_name') }}</th>
                            <th>{{ trans('admin/products.product_image') }}</th>
                            <th>{{ trans('admin/products.product_category') }}</th>
                            <th>{{ trans('admin/products.user_add') }}</th>
                            <th>{{ trans('admin/products.views_number') }}</th>
                            <th>{{ trans('admin/products.add_data') }}</th>
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
                                <td>{{ $Product->Category->category_name_en }}</td>
                                @else
                                <td>{{ $Product->product_name_ar }}</td>
                                <td>{{ $Product->Category->category_name_en }}</td>
                                @endif
                                <td> <img src="{{asset('uploads/'.$Product->image)}}" width="70px" height="60px"></td>
                                <td>{{ $Product->User->name }}</td>
                                <td>{{ $Product->views }}</td>
                                <td>{{ $Product->created_at }}</td>

                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $Product->id }}"
                                    title="{{ trans('admin/categories.edit') }}"><i
                                    class="fa fa-edit"></i></button>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $Product->id }}"
                                    title="{{ trans('admin/categories.delete') }}"><i
                                    class="fa fa-trash"></i></button>




                                </td>
                            </tr>


                           



                                <!-- delete_modal_Category -->
                                <div class="modal fade" id="delete{{ $Product->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('admin/categories.delete_category') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{route('admin.categories.destroy',$Product->id)}}" method="post">
                                                {{method_field('Delete')}}
                                                @csrf
                                                {{ trans('admin/categories.warning_category') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $Category->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('admin/categories.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('admin/categories.delete') }}</button>
                                                </div>
                                            </form>
                                        </div>

                                        
                                    </div>
                                </div>
                                </div>



                        @endforeach
                    </table>
                </div>
                {{ $Categories->links() }}











</div>

<!-- row closed -->

        <!--=================================
footer -->


    </div><!-- main content wrapper end-->
</div>
</div>
</div>
@endsection



