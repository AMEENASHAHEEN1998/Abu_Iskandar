@extends('admin.layouts.master')
@section('title')
الملاحظات
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


                <a class="btn btn-primary btn-sm" href="{{ route('admin.customers.create') }}">اضافة زبون</a>


                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                           data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الزبون</th>
                            <th>رقم الجوال</th>
                            <th>حرف السيارة</th>
                            <th>اسم المشرف</th>
                            <th>الملاحظة</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php $i = 0; ?>

                         @foreach ($Customers as $Customer)
                         @if($Customer->Note && $Customer->Note->status_value == 1)



                          <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>

                                <td>{{ $Customer->first_name }}
                                {{ $Customer->middle_name }}
                                {{ $Customer->last_name }}</td>

                                <td>{{ $Customer->phone_number }}</td>
                                <td>
                                @foreach (App\Models\CustomerCar::where('customer_id' , $Customer->id)->get() as $CustomerCar )
                                    @foreach ($Cars as $Car )
                                        @if ($Car->id == $CustomerCar->Car->id )
                                        {{ $CustomerCar->Car->name }} -

                                        @endif
                                    @endforeach
                                @endforeach
                                </td>
                                <td>
                                    @foreach (App\Models\CustomerCar::where('customer_id' , $Customer->id)->get() as $CustomerCar )
                                    @foreach ($Users as $User )
                                        @if ($User->id == $CustomerCar->User->id )
                                        {{ $CustomerCar->User->name }} -

                                        @endif
                                    @endforeach
                                @endforeach
                                </td>
                                <td>{{  (($Customer->Note)?$Customer->Note->note_employee : "") }}</td>
                                <td>
                                   <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $Customer->id }}"
                                    title="اضافة ملاحظة"><i
                                    class="fa fa-edit"></i>اضافة ملاحظة</button>

                            </tr>

                            
                            @endif
 <!-- edit_modal_Category -->
 <div class="modal fade" id="edit{{ $Customer->id }}" tabindex="-1" role="dialog"
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
               <form action="{{route('admin.updatenote' , $Customer->id ) }}" method="post" enctype="multipart/form-data">
                   {{method_field('patch')}}
                   @csrf
                   <div class="row">
                    <div class="col">
                        <label for="note_employee"
                               class="mr-sm-2">ملاحظة الزبون
                            :</label>

                            <textarea name="note_employee" id="note_employee" cols="30" rows="10"></textarea>
                    </div>

                </div>

                   <br><br>

                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">{{ trans('admin/categories.close') }}</button>
                       <button type="submit"
                               class="btn btn-success">{{ trans('admin/categories.submit') }}</button>
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

<!-- row closed -->

        <!--=================================
footer -->


    </div><!-- main content wrapper end-->
</div>
</div>
</div>
@endsection


