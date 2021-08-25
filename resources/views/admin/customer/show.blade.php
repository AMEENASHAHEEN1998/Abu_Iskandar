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

                <h2>  عرض الزبون</h2>

                    <div class="card-body">


                     <h3>معلومات الزبون</h3>

                     <div class="row">
                         <div class="col">
                             <label for="first_name"
                                     class="mr-sm-2"> اسم الزبون
                                 :</label>
                             <input id="first_name" class="form-control" disabled value="{{ $CustomerCar->Customer->first_name }}" type="text" name="first_name" required />
                         </div>

                         <div class="col">
                             <label for="middle_name"
                                     class="mr-sm-2"> اسم الوسط
                                 :</label>
                             <input id="middle_name" class="form-control" disabled value="{{ $CustomerCar->Customer->middle_name }}" type="text" name="middle_name" required />
                         </div>

                         <div class="col">
                             <label for="last_name"
                                     class="mr-sm-2"> اسم العائلة
                                 :</label>
                             <input id="last_name" class="form-control" disabled value="{{ $CustomerCar->Customer->middle_name }}" type="text" name="last_name" required />
                         </div>
                     </div>

                     <div class="row">
                         <div class="col">
                             <label for="job_name"
                                     class="mr-sm-2">المسمى التجاري
                                 :</label>
                             <input id="job_name" class="form-control" disabled value="{{ $CustomerCar->Customer->job_name }}" type="text" name="job_name" required />
                         </div>

                         <div class="col">
                             <label for="phone_number"
                                     class="mr-sm-2">  رقم الجوال
                                 :</label>
                             <input id="phone_number" class="form-control" disabled value="{{ $CustomerCar->Customer->phone_number }}" type="text" name="phone_number" required />
                         </div>
                     </div>
                     <div class="row">
                         <div class="col">
                             <label
                                     class="mr-sm-2">تصنيف الزبون
                                 :</label>

                             <div class="box ">

                                     @foreach ($Classes as $Class)
                                          @if ($Class->id == $CustomerCar->Customer->class_id)

                                            <input class="form-control"  disabled value="{{ $Class->name }}" disabled>
                                            @endif
                                         @endforeach

                             </div>

                         </div>

                         <div class="col">
                             <label
                                     class="mr-sm-2">التعامل المالي
                                 :</label>

                             <div class="box ">
                                
                                 <select class="form-control form-control-lg " disabled name="financial_dealing">
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

                                     @foreach ($Cities as $City)

                                            @if ($City->id == $CustomerCar->Customer->city_id)
                                            <input class="form-control" disabled value="{{ $City->name }}">
                                            @endif

                                     @endforeach



                             </div>

                         </div>

                         <div class="col">
                             <label
                                     class="mr-sm-2"> الحي
                                 :</label>

                             <div class="box ">

                                @foreach ($Neighborhoods as $Neighborhood )
                                @if ($Neighborhood->id == $CustomerCar->Customer->id_neighborhood)
                                <input class="form-control" disabled value="{{ $Neighborhood->name }}">

                                @endif
                             @endforeach
                             </div>

                         </div>
                     </div>
                     <div class="row">
                         <div class="col">
                             <label
                                     class="mr-sm-2"> الشارع
                                 :</label>

                             <div class="box ">
                                 @foreach ($Streets as $Street )
                                    @if ($Street->id == $CustomerCar->Customer->street_id)
                                    <input class="form-control" disabled value="{{ $Street->name }}">

                                    @endif
                                 @endforeach
                             </div>

                         </div>
                         <div class="col">
                             <label for="area"
                                     class="mr-sm-2"> المنطقة
                                 :</label>
                             <input id="area" class="form-control" disabled value="{{ $CustomerCar->Customer->area }}" type="text" name="area" required />
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
                                            <input class="form-control" disabled value="{{ $CustomerCar->Car->name }}">
                                         </div>

                                     </div>


                                     <div class="col">
                                         <label for="original_number"
                                                 class="mr-sm-2">رقم الأصيل
                                             :</label>
                                         <input id="original_number" disabled class="form-control" value="{{ $CustomerCar->original_number}}" type="integer" name="original_number" required />
                                     </div>

                                 </div>
                                 <div class="row">
                                     <div class="col">
                                         <label
                                                 class="mr-sm-2">اسم المشرف
                                             :</label>

                                         <div class="box col-md-6 ">
                                             <input class="form-control" disabled value="{{ $CustomerCar->User->name }}">

                                         </div>

                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col">
                                         <label for="note_supervisor"
                                                 class="mr-sm-2">  ملاحظة المشرف
                                             :</label>
                                         <textarea name="note_supervisor" disabled class="form-control" id="note_supervisor" cols="30" rows="10">{{ $CustomerCar->note_supervisor}}</textarea>
                                     </div>
                                 </div>







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



