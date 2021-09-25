@extends('admin.layouts.master')
@section('title')
الزبائن
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


                <a class="btn btn-primary btn-sm" href="{{ route('admin.customers.create') }}">اضافة زبون</a>


                <br><br>
                <h2>{{ trans('admin/dashboard.customer') }}</h2>
                <form action="{{route('admin.findCustomer')}}" method="GET">

                    <div class="row" >
                        <div class="col-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="query"
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



                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                           data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الزبون</th>
                            <th>اسم الوسط</th>
                            <th>اسم العائلة</th>
                            <th>المسمى التجاري</th>
                            <th>رقم الجوال</th>
                            <th>حرف السيارة</th>
                            <th>رقم الأصيل</th>
                            <th>اسم المشرف</th>
                            <th> تاريخ فتح الحساب</th>
                            <th>العمليات</th>

                        </tr>
                        </thead>
                        <tbody>

                            <?php $i = 0; ?>

                         @foreach ($CustomerCars as $CustomerCar)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>

                                <td>{{ $CustomerCar->Customer->first_name }}</td>
                                <td>{{ $CustomerCar->Customer->middle_name }}</td>
                                <td>{{ $CustomerCar->Customer->last_name }}</td>

                                <td>{{ $CustomerCar->Customer->job_name }}</td>
                                <td>{{ $CustomerCar->Customer->phone_number }}</td>
                                <td>{{ $CustomerCar->Car->name }}</td>
                                <td>{{ $CustomerCar->original_number}}</td>
                                <td>{{ (( $CustomerCar->User)? $CustomerCar->User->name:"غير معرف") }}</td>
                                <td>{{ $CustomerCar->created_at->format('Y-m-d') }}</td>

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




                                </td>
                            </tr>


<!-- edit_modal_Product -->
<div class="modal fade" id="edit{{ $CustomerCar->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   تعديل معلومات الزبون
               </h5>
               <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div >
               <!-- add_form -->
               <form action="{{route('admin.customers.update' , $CustomerCar->id ) }}" method="post" enctype="multipart/form-data">
                   {{method_field('patch')}}
                   @csrf
                   <div class="card-body">


                    <h3>معلومات الزبون</h3>

                    <div class="row">
                        <div class="col">
                            <label for="first_name"
                                    class="mr-sm-2"> اسم الزبون
                                :</label>
                            <input id="first_name" class="form-control" value="{{ $CustomerCar->Customer->first_name }}" type="text" name="first_name" required />
                        </div>

                        <div class="col">
                            <label for="middle_name"
                                    class="mr-sm-2"> اسم الوسط
                                :</label>
                            <input id="middle_name" class="form-control" value="{{ $CustomerCar->Customer->middle_name }}" type="text" name="middle_name" required />
                        </div>

                        <div class="col">
                            <label for="last_name"
                                    class="mr-sm-2"> اسم العائلة
                                :</label>
                            <input id="last_name" class="form-control" value="{{ $CustomerCar->Customer->middle_name }}" type="text" name="last_name" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="job_name"
                                    class="mr-sm-2">المسمى التجاري
                                :</label>
                            <input id="job_name" class="form-control" value="{{ $CustomerCar->Customer->job_name }}" type="text" name="job_name" required />
                        </div>

                        <div class="col">
                            <label for="phone_number"
                                    class="mr-sm-2">  رقم الجوال
                                :</label>
                            <input id="phone_number" class="form-control" value="{{ $CustomerCar->Customer->phone_number }}" type="text" name="phone_number" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label
                                    class="mr-sm-2">تصنيف الزبون
                                :</label>

                            <div class="box ">
                                <select class="form-control form-control-lg " name="class_id">
                                    @foreach ($Classes as $Class)
                                        <option {{ ($CustomerCar->Customer->class_id == $Class->id? "selected"  : "") }} value="{{ $Class->id }}">{{ $Class->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col">
                            <label
                                    class="mr-sm-2">التعامل المالي
                                :</label>

                            <div class="box ">
                                <select class="form-control form-control-lg " name="financial_dealing">
                                    <option {{ ($CustomerCar->Customer->financial_dealing == "A"? "selected"  : "") }} value="A"> ممتاز</option>
                                    <option {{ ($CustomerCar->Customer->financial_dealing == "B"? "selected"  : "") }} value="B"> جيد جدا</option>
                                    <option {{ ($CustomerCar->Customer->financial_dealing == "C"? "selected"  : "") }} value="C"> جيد</option>
                                    <option {{ ($CustomerCar->Customer->financial_dealing == "D"? "selected"  : "") }} value="D"> ضعيف</option>
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label
                                    class="mr-sm-2"> المدينة
                                :</label>

                            <div class="box ">
                                <select class="form-control form-control-lg " name="city_id">
                                    @foreach ($Cities as $City)

                                        <option {{ ($CustomerCar->Customer->city_id == $City->id? "selected"  : "") }} value="{{ $City->id }}">{{ $City->name }}</option>

                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col">
                            <label
                                    class="mr-sm-2"> الحي
                                :</label>
                                @foreach ($Neighborhood as $Neighbor )
                                {{ ($CustomerCar->Customer->id_neighborhood == $Neighbor->id ? $Neighbor->name : "") }}

                                @endforeach
                            <div class="box ">
                                <select class="form-control form-control-lg " name="id_neighborhood">

                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label
                                    class="mr-sm-2"> الشارع
                                :</label>
                                @foreach ($Streets as $Street )
                                {{ ($CustomerCar->Customer->street_id == $Street->id ? $Street->name : "") }}

                                @endforeach
                            <div class="box ">
                                <select class="form-control form-control-lg " name="street_id">

                                </select>
                            </div>

                        </div>
                        <div class="col">
                            <label for="area"
                                    class="mr-sm-2"> المنطقة
                                :</label>
                            <input id="area" class="form-control" value="{{ $CustomerCar->Customer->area }}" type="text" name="area" required />
                        </div>
                    </div>
                    <br> <br>
                    <h3>معلومات السيارة</h3>


                                <div class="row">

                                    <div class="col">
                                        <label
                                                class="mr-sm-2">حرف السيارة
                                            :</label>

                                        <div class="box ">
                                            <select class="form-control form-control-lg " name="car_id">
                                                @foreach ($Cars as $Car)

                                                    <option {{ ($CustomerCar->Car->name == $Car->name? "selected"  : "") }} value="{{ $Car->id }}">{{ $Car->name }}</option>

                                                @endforeach
                                            </select>
                                        </div>

                                    </div>


                                    <div class="col">
                                        <label for="original_number"
                                                class="mr-sm-2">رقم الأصيل
                                            :</label>
                                        <input id="original_number" class="form-control" value="{{ $CustomerCar->original_number}}" type="integer" name="original_number" required />
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label
                                                class="mr-sm-2">اسم المشرف
                                            :</label>

                                        <div class="box col-md-6 ">
                                            <select class="form-control form-control-lg " name="name">
                                                @foreach ($Users as $User)
                                                <option {{ ($CustomerCar->User->name == $User->name? "selected"  : "") }} value="{{ $User->id }}">{{ $User->name }}</option>


                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="note_supervisor"
                                                class="mr-sm-2">  ملاحظة المشرف
                                            :</label>
                                        <textarea name="note_supervisor" class="form-control" id="note_supervisor" cols="30" rows="10">{{ $CustomerCar->note_supervisor}}</textarea>
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
       </div>
   </div>
</div>



    <!-- delete_modal_Category -->
    <div class="modal fade" id="delete{{ $CustomerCar->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="exampleModalLabel">
                    حذف حرف السيارة لهذا الزبون
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{route('admin.customers.destroy',$CustomerCar->id)}}" method="post">
                    {{method_field('Delete')}}
                    @csrf
                    هل أنت متأكد من عملية حذف حرف السيارة المتعلقة بالزبون ؟
                    <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $CustomerCar->id }}">
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












</div>

<!-- row closed -->

        <!--=================================
footer -->


    </div><!-- main content wrapper end-->
</div>
</div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('select[name="city_id"]').on('change', function() {
                var city_id = $(this).val();
                if (city_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/get_neighborhood') }}/" + city_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="id_neighborhood"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="id_neighborhood"]').append('<option value="' +
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

<script>
    $(document).ready(function() {
        $('select[name="id_neighborhood"]').on('change', function() {
            var id_neighborhood = $(this).val();
            if (id_neighborhood) {
                $.ajax({
                    url: "{{ URL::to('admin/get_street') }}/" + id_neighborhood,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="street_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="street_id"]').append('<option value="' +
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


