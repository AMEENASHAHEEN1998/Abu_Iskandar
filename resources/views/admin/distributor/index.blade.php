@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/distributor.distributors') }}
@endsection
@section('content')



    <!--=================================
         Main content -->
    <!-- main-content -->
    <!-- row -->
    <div class="row">
        @include('admin.include.alerts.success')
        @include('admin.include.alerts.errors')
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">






                    <a href="{{ route('admin.distributor.create') }}"  class="btn btn-success" data-toggle="modal"
                    data-target="#exampleModal">
                     {{ trans('admin/distributor.add_distributor') }}
                    </a>


                    {{-- <a href="{{ route('admin.street.create') }}" class="btn btn-success" data-toggle="modal"
                    data-target="#exampleModal">
                    {{ trans('admin/street.addstreet') }}
                </a> --}}


                    <br><br>
                    <h1>{{ trans('admin/distributor.distributors') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin/distributor.name') }}</th>
                                    <th>{{ trans('admin/distributor.phone_number') }}</th>

                                    <th>{{ trans('admin/distributor.distributors_type') }}</th>
                                    <th>{{ trans('admin/distributor.place') }}</th>

                                    <th>{{ trans('admin/distributor.add_name') }}</th>
                                    <th>{{ trans('admin/distributor.date') }}</th>
                                    <th>{{ trans('admin/distributor.action') }}</th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $lng = app()->getLocale();
                               ?>

                                @foreach ($distributors as $distributor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $distributor->{'name_' . $lng} }}</td>
                                        <td>{{ $distributor->phone_number }}</td>


                                        <td>{{ ($distributor->DistributorType) ? $distributor->DistributorType->{'name_' . $lng} : trans('admin/dashboard.none_user') }}</td>

                                        <td>{{ $distributor->place}}</td>


                                        <td>{{ ($distributor->user) ? $distributor->user->name : trans('admin/dashboard.none_user') }}</td>


                                        <td>{{ $distributor->created_at->format('d-m-Y')  }}</td>


                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#exampleModaledit{{ $distributor->id }}"
                                            title="{{ trans('admin/users.edit') }}"><i
                                                class="fa fa-edit"></i></button>


                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $distributor->id }}"
                                            title="{{ trans('admin/distributor.delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>


                                    {{-- edit --}}
                                    
                                    <div class="modal fade" id="exampleModaledit{{ $distributor->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/distributor.update_distributors') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                
                                                    
                                                    <form action="{{ route('admin.distributor.update',$distributor->id) }}" method="POST" enctype="multipart/form-data">
                                                        @method('put')
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                
                                
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="formGroupExampleInput">{{ trans('admin/distributor.name_ar') }}</label>
                                                                    <input type="text" name="name_ar" value="{{ $distributor->name_ar }}" class="form-control" id="formGroupExampleInput">
                                                                </div>
                                                            </div>
                                
                                                            @error('name_ar')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="formGroupExampleInput">{{ trans('admin/distributor.name_en') }}</label>
                                                                    <input type="text" name="name_en" value="{{ $distributor->name_en }}" class="form-control"  id="formGroupExampleInput">
                                                                </div>
                                                            </div>
                                
                                                            @error('name_en')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                
                                
                                                        </div>
                                
                                
                                
                                
                                
                                
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput">{{ trans('admin/distributor.phone_number') }}</label>
                                                                <input type="text" name="phone_number" value="{{ $distributor->phone_number }}"  class="form-control" id="formGroupExampleInput">
                                                            </div>
                                                        </div>
                                
                                                        @error('phone_number')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                
                                
                                
                                                        <?php
                                                        $lng = app()->getLocale();
                                                        ?>
                                
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="Name_en" class="mr-sm-2">{{ trans('admin/distributor.distributors_type') }}
                                                                    :</label>
                                
                                                                <div class="box col-md-6">
                                                                    <select class="form-control form-selected" style="height: 50px"
                                                                        name="distributor_type_id">
                                                                        <option value=""></option>
                                
                                                                        @foreach ($distributor_types as $types)
                                                                            <option value="{{ $types->id }}" @if ($types->id == $distributor->distributor_type_id) selected @endif>{{ $types->{'name_' . $lng} }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                
                                                            </div>
                                                        </div>
                                
                                
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="formGroupExampleInput">{{ trans('admin/distributor.place') }}</label>
                                                                    <input type="text" name="place" value="{{$distributor->place}}" class="form-control"
                                                                        id="formGroupExampleInput">
                                                                </div>
                                                            </div>
                                
                                                            @error('place')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                
                                                        </div>
                                
                                
                                
                                
                                
                                
                                                        <button class="btn btn-success btn-lg">{{ trans('admin/distributor.save') }}</button>
                                
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- edit --}}


                                        <!-- delete_modal_distributortype -->
                                           <!-- delete_modal_Category -->
                                           <div class="modal fade" id="delete{{ $distributor->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('admin/distributor.delete_distributors') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('admin.distributor.destroy',$distributor->id)}}" method="post">
                                                            {{method_field('Delete')}}
                                                            @csrf
                                                            {{ trans('admin/distributor.warning_distributors') }}
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                    value="{{ $distributor->id }}">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('admin/distributor.close') }}</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">{{ trans('admin/distributor.delete') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <!-- delete_modal_distributortype -->
                                @endforeach


                        </table>
                        {{$distributors->links()}}

                    </div>



                          {{-- add --}}
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                          aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                          id="exampleModalLabel">
                                          {{ trans('admin/distributor.add_distributor') }}
                                      </h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
  
                                  <div class="modal-body">
                                      <!-- add_form -->
                                      <form action="{{ route('admin.distributor.store') }}" method="POST" enctype="multipart/form-data">

                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                
                
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput">{{ trans('admin/distributor.name_ar') }}</label>
                                                    <input type="text" name="name_ar" class="form-control" id="formGroupExampleInput">
                                                </div>
                                            </div>
                
                                            @error('name_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                
                
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput">{{ trans('admin/distributor.name_en') }}</label>
                                                    <input type="text" name="name_en" class="form-control" id="formGroupExampleInput">
                                                </div>
                                            </div>
                
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                
                                        </div>
                
                
                
                
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label
                                                    for="formGroupExampleInput">{{ trans('admin/distributor.phone_number') }}</label>
                                                <input type="text" name="phone_number" class="form-control"
                                                    id="formGroupExampleInput">
                                            </div>
                                        </div>
                
                                        @error('phone_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                
                
                
                                        <?php
                                        $lng = app()->getLocale();
                                       ?>
                
                                        <div class="row">
                                            <div class="col">
                                                <label for="Name_en"
                                                        class="mr-sm-2">{{ trans('admin/distributor.distributors_type') }}
                                                    :</label>
                
                                                <div class="box col-md-8">
                                                    <select class="form-control form-selected" style="height: 50px" name="distributor_type_id">
                                                        <option value=""></option>
                
                                                        @foreach ($distributor_types as $types)
                                                            <option value="{{ $types->id }}">{{ $types->{'name_' . $lng} }}</option>
                
                                                        @endforeach
                                                    </select>
                                                </div>
                
                                            </div>
                                        </div>
                
                
                
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label
                                                        for="formGroupExampleInput">{{ trans('admin/distributor.place') }}</label>
                                                    <input type="text" name="place" class="form-control"
                                                        id="formGroupExampleInput">
                                                </div>
                                            </div>
                
                                            @error('place')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                
                                        </div>
                
                
                
                                        <button class="btn btn-success btn-lg">{{ trans('admin/distributor.save') }}</button>
                
                                    </form>
                
                                  </div>
                              </div>
                          </div>
  
                      </div>
  
                      {{-- add --}}
                </div>
            </div>
        </div>





    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
