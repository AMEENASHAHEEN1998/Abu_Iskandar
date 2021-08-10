@extends('admin.layouts.master')
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

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('admin/subcategories.add_subcategory') }}
                </button>


                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                           data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('admin/subcategories.subcategory_name') }}</th>                           
                            <th>{{ trans('admin/subcategories.user_add') }}</th>
                            <th>{{ trans('admin/subcategories.add_data') }}</th>
                            <th>{{ trans('admin/subcategories.process') }}</th>

                        </tr>
                        </thead>
                        <tbody>



                            <?php $i = 0; ?>

                         @foreach ($Subcategories as $Subcategory)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                @if (App::getLocale() == 'en')
                                <td>{{ $Subcategory->sub_category_name_en }}</td>

                                @else
                                <td>{{ $Subcategory->sub_category_name_ar }}</td>
                                @endif
                                
                                <td>{{ $Subcategory->User->name }}</td>
                                <td>{{ $Subcategory->created_at }}</td>

                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $Subcategory->id }}"
                                    title="{{ trans('admin/subcategory.edit') }}"><i
                                    class="fa fa-edit"></i></button>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $Subcategory->id }}"
                                    title="{{ trans('admin/subcategory.delete') }}"><i
                                    class="fa fa-trash"></i></button>




                                </td>
                            </tr>

 
                            <!-- edit_modal_Category -->
                            <div class="modal fade" id="edit{{ $Subcategory->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                               id="exampleModalLabel">
                                               {{ trans('admin/categories.edit_category') }}
                                           </h5>
                                           <button type="button" class="close" data-dismiss="modal"
                                                   aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                       </div>
                                       <div class="modal-body">
                                           <!-- add_form -->
                                           <form action="{{route('admin.subcategories.update' , $Subcategory->id ) }}" method="post" enctype="multipart/form-data">
                                               {{method_field('patch')}}
                                               @csrf
                                               <div class="row">
                                                <div class="col">
                                                    <label for="Name"
                                                           class="mr-sm-2">{{ trans('admin/subcategories.subcategory_name_ar') }}
                                                        :</label>
                                                    <input id="Name" type="text" name="name_ar" value= " {{ $Subcategory->sub_category_name_ar}}" class="form-control" required autocomplete="off">
                                                </div>
                                                <div class="col">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ trans('admin/subcategories.subcategory_name_en') }}
                                                        :</label>
                                                    <input type="text" class="form-control" name="name_en" value= " {{$Subcategory->sub_category_name_en}}" required autocomplete="off">
                                                </div>
                                            </div>
                                            
                                               <br><br>

                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary"
                                                           data-dismiss="modal">{{ trans('admin/subcategories.close') }}</button>
                                                   <button type="submit"
                                                           class="btn btn-success">{{ trans('admin/subcategories.submit') }}</button>
                                               </div>
                                           </form>

                                       </div>
                                   </div>
                               </div>
                           </div>


                          
                                <!-- delete_modal_Category -->
                                <div class="modal fade" id="delete{{ $Subcategory->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('admin/subcategories.delete_subcategory') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('admin.subcategories.destroy',$Subcategory->id)}}" method="post">
                                                {{method_field('Delete')}}
                                                @csrf
                                                {{ trans('admin/subcategories.warning_category') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $Subcategory->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('admin/subcategories.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('admin/subcategories.delete') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                           


                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- add_modal_Subcategory -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        {{ trans('admin/subcategories.add_subcategory') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('admin.subcategories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name"
                                       class="mr-sm-2">{{ trans('admin/subcategories.subcategory_name_ar') }}
                                    :</label>
                                <input id="Name" type="text" name="name_ar" class="form-control" required autocomplete="off">
                            </div>
                            <div class="col">
                                <label for="Name_en"
                                       class="mr-sm-2">{{ trans('admin/subcategories.subcategory_name_en') }}
                                    :</label>
                                <input type="text" class="form-control" name="name_en" required autocomplete="off">
                            </div>
                        </div>
                        

                        <br><br>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('admin/subcategories.close') }}</button>
                    <button type="submit"
                            class="btn btn-success">{{ trans('admin/subcategories.submit') }}</button>
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



