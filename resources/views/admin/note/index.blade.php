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
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php $i = 0; ?>

                         @foreach ($Customers as $Customer)

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
                                <td> <a href="{{ route('admin.sendtoaddnote',$Customer->id) }}">ارسال لاضافة ملاحظة</a> </td>
                                {{-- <td>{{ $CustomerCar->original_number}}</td>
                                <td>{{ $CustomerCar->User->name }}</td>

                                <td>
                                    <a href="{{ route('admin.customers.show', $CustomerCar->id) }}"
                                        class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $CustomerCar->id }}"
                                    title="{{ trans('admin/products.edit') }}"><i
                                    class="fa fa-edit"></i></button>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $CustomerCar->id }}"
                                    title="{{ trans('admin/products.delete') }}"><i
                                    class="fa fa-trash"></i></button>




                                </td> --}}
                            </tr>

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


