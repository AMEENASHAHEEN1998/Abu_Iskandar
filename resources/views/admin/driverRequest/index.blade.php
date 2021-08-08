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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                            create
                    </button>


                    <br><br>
                    <h1>{{ trans('admin/driverrequest.Request_driver') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>{{ trans('admin/driverrequest.ID') }}</th>
                                    <th>{{ trans('admin/driverrequest.user_id') }}</th>
                                    <th>{{ trans('admin/driverrequest.product_id') }}</th>
                                    <th>{{ trans('admin/driverrequest.size') }}</th>
                                    <th>{{ trans('admin/driverrequest.price') }}</th>
                                    <th>{{ trans('admin/driverrequest.number') }}</th>
                                    <th>{{ trans('admin/driverrequest.status') }}</th>
                                    <th>{{ trans('admin/driverrequest.action') }}</th>

                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->User->name }}</td>
                                        <td>{{ $order->product_id }}</td>
                                        <td>{{ $order->size }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->number }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <a href="" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <form class="d-inline" action="" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('are you sure?')"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                       id="exampleModalLabel">
                       {{ trans('admin/news.add_news_type') }}
                   </h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <!-- add_form -->
                   <form action="" method="POST">
                       @csrf
                       <div class="row">
                           <div class="col">
                               <label for="Name"
                                      class="mr-sm-2">{{ trans('admin/news.news_category_name_ar') }}
                                   :</label>
                               <input id="Name" type="text" name="Name" class="form-control">
                           </div>
                           <div class="col">
                               <label for="Name_en"
                                      class="mr-sm-2">{{ trans('admin/news.news_category_name_en') }}
                                   :</label>
                               <input type="text" class="form-control" name="Name_en" required>
                           </div>
                       </div>
                       <div class="form-group">
                           <label
                               for="exampleFormControlTextarea1">{{ trans('admin/news.Notes') }}
                               :</label>
                           <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                     rows="3"></textarea>
                       </div>
                       <br><br>

               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary"
                           data-dismiss="modal">{{ trans('admin/news.Close') }}</button>
                   <button type="submit"
                           class="btn btn-success">{{ trans('admin/news.submit') }}</button>
               </div>
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
