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
    {{-- @if (session('success')) --}}
      {{-- <div class="alert alert-success">{{ session('success') }}</div>
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

                <h2>اضافة زبون جديد</h2>

                <form class=" row mb-30" action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">


                        <h3>معلومات الزبون</h3>

                        <div class="row">
                            <div class="col">
                                <label for="first_name"
                                        class="mr-sm-2"> اسم الزبون
                                    :</label>
                                <input id="first_name" class="form-control" type="text" name="first_name" required />
                            </div>

                            <div class="col">
                                <label for="middle_name"
                                        class="mr-sm-2"> اسم الوسط
                                    :</label>
                                <input id="middle_name" class="form-control" type="text" name="middle_name" required />
                            </div>

                            <div class="col">
                                <label for="last_name"
                                        class="mr-sm-2"> اسم العائلة
                                    :</label>
                                <input id="last_name" class="form-control" type="text" name="last_name" required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="job_name"
                                        class="mr-sm-2">المسمى التجاري
                                    :</label>
                                <input id="job_name" class="form-control" type="text" name="job_name" required />
                            </div>

                            <div class="col">
                                <label for="phone_number"
                                        class="mr-sm-2">  رقم الجوال
                                    :</label>
                                <input id="phone_number" class="form-control" type="text" name="phone_number" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label
                                        class="mr-sm-2">تصنيف الزبون
                                    :</label>

                                <div class="box ">
                                    <select class="form-control form-control-lg " name="class_id">
                                        <option value="1">ميني ماركت</option>
                                            <option value="2"> ماركت</option>
                                            <option value="3">سوبر ماركت</option>
                                        @foreach ($Classes as $Class)

                                            {{-- <option value="{{ $Class->id }}">{{ $Class->name }}</option>--}}



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
                                        <option value="A"> ممتاز</option>
                                        <option value="B"> جيد جدا</option>
                                        <option value="C"> جيد</option>
                                        <option value="D"> ضعيف</option>


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

                                            <option value="{{ $City->id }}">{{ $City->name }}</option>

                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="col">
                                <label
                                        class="mr-sm-2"> الحي
                                    :</label>

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

                                <div class="box ">
                                    <select class="form-control form-control-lg " name="street_id">
                                        {{-- @foreach ($Streets as $Street)

                                            <option value="{{ $Street->id }}">{{ $Street->name }}</option>

                                        @endforeach --}}
                                    </select>
                                </div>

                            </div>
                            <div class="col">
                                <label for="area"
                                        class="mr-sm-2"> المنطقة
                                    :</label>
                                <input id="area" class="form-control" type="text" name="area" required />
                            </div>
                        </div>
                        <br> <br>
                        <h3>معلومات السيارة</h3>
                        <div class="repeater">
                            <div data-repeater-list="list_cars">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label
                                                    class="mr-sm-2">حرف السيارة
                                                :</label>

                                            <div class="box ">
                                                <select class="form-control form-control-lg " name="car_id">
                                                    @foreach ($Cars as $Car)

                                                        <option value="{{ $Car->id }}">{{ $Car->name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>


                                        <div class="col">
                                            <label for="original_number"
                                                    class="mr-sm-2">رقم الأصيل
                                                :</label>
                                            <input id="original_number" class="form-control" type="integer" name="original_number" required />
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

                                                        <option value="{{ $User->id }}" >{{ $User->name }}</option>

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
                                            <textarea name="note_supervisor" class="form-control" id="note_supervisor" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                         <div class="row">
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="اضافة حرف السيارة المشترك"/>
                                </div>

                            </div>
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


