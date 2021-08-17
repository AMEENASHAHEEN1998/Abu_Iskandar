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

                    <a href="{{ route('admin.driverrequest.index') }}"  class="btn btn-success">
                        {{ trans('admin/driverrequest.back') }}
                    </a>
                    <h2>{{ trans('admin/driverrequest.add_request') }}</h2>

                    <hr>


                    <form class=" row mb-30" action="{{ route('admin.driverrequest.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">



                                        <div class="row">
                                            <div class="col">
                                                <label for="Name_en"
                                                        class="mr-sm-2">{{ trans('admin/driverrequest.primary_category') }}
                                                    :</label>

                                                <div class="box ">
                                                    <select class="form-control form-control-lg" name="category_id" onclick="console.log($(this).val())"
                                                    onchange="console.log('change is firing')">
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
                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('admin/driverrequest.sub_category') }}
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

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="product"
                                                        class="mr-sm-2">{{ trans('admin/driverrequest.product') }}
                                                    :</label>


                                                    <select class="form-control form-control-lg" id="product" name="product">

                                                    </select>



                                            </div>


                                            <div class="col">
                                                <label for="number"
                                                        class="mr-sm-2">{{ trans('admin/driverrequest.number') }}
                                                    :</label>
                                                <input id="number" class="form-control form-control-lg" type="text" name="number" required />
                                            </div>

                                        </div>


                                    </div>
                                </div>


                            


                                <div class="modal-footer">

                                    <button type="submit"
                                            class="btn btn-success">{{ trans('admin/driverrequest.submit') }}</button>

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
@section('js')
    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('admin/get_products') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="product"]').append('<option value="' +
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
