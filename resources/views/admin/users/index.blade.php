@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/user.users') }}
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






                    <a href="{{ route('admin.users.create') }}" class="btn btn-success" data-toggle="modal"
                        data-target="#exampleModal">
                        {{ trans('admin/user.adduser') }}
                    </a>



                    <br><br>
                    <h1>{{ trans('admin/user.users') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin/user.username') }}</th>
                                    <th>{{ trans('admin/user.roles_name') }}</th>
                                    <th>{{ trans('admin/user.action') }}</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $lng = app()->getLocale();
                                ?>

                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->roles_name }}</td>



                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#exampleModaledit{{ $user->id }}"
                                                title="{{ trans('admin/users.edit') }}"><i
                                                    class="fa fa-edit"></i></button>


                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $user->id }}"
                                                title="{{ trans('admin/user.delete') }}"><i
                                                    class="fa fa-trash"></i></button>

                                        </td>
                                    </tr>

                                    <!-- edit_modal_users -->

                                    <div class="modal fade" id="exampleModaledit{{ $user->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/user.update') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form
                                                        action="{{ route('admin.users.update', $user->id) }}"
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <input type="hidden" name="user_id"
                                                            value="{{ auth()->user()->id }}">

                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Name"
                                                                        class="mr-sm-2">{{ trans('admin/user.username') }}
                                                                        :</label>
                                                                    <input id="Name" type="text" name="name" value="{{$user->username}}" class="form-control" >
                                                                    @error('name')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Name"
                                                                        class="mr-sm-2">{{ trans('admin/user.password') }}
                                                                        :</label>
                                                                    <input id="Name" type="password" name="password"  class="form-control" >
                                                                    @error('name')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Name"
                                                                    class="mr-sm-2">{{ trans('admin/user.roles_name') }}
                                                                    :</label>

                                                                    <select name="roles_name" id=""  class="form-control">
                                                                        <option value=""></option>
                                                                        <option value="مدير" @if($user->roles_name =='مدير') selected @endif > مدير </option>
                                                                        <option value="مشرف" @if($user->roles_name =='مشرف') selected @endif >مشرف</option>
                                                                        <option value="مندوب" @if($user->roles_name =='مندوب') selected @endif>مندوب</option>
                                                                        <option value="مستخدم عادي" @if($user->roles_name =='مستخدم عادي') selected @endif>مستخدم عادي</option>

                                                                    </select>
                                                                </div>

                                                            </div>









                                                        <div class="modal-footer">





                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('admin/user.close') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">{{ trans('admin/user.update') }}</button>
                                                            </div>

                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                        <!-- edit_modal_car -->

                                        <!-- delete_modal_car -->
                                           <!-- delete_modal_Category -->
                                    <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/user.delete_user') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('admin.users.destroy',$user->id)}}" method="post">
                                                        {{method_field('Delete')}}
                                                        @csrf
                                                        {{ trans('admin/user.warning_user') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                                value="{{ $user->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('admin/user.close') }}</button>
                                                            <button type="submit"
                                                                    class="btn btn-danger">{{ trans('admin/user.delete') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- delete_modal_user-->



                                @endforeach

                        </table>

                        {{$users->links()}}

                    </div>



{{-- add --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        {{ trans('admin/user.adduser') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('admin.users.store') }}" method="POST">
                                        @csrf

                                        {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}

                                        <div class="row">


                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('admin/user.username') }}
                                                    :</label>
                                                <input id="Name" type="text" name="name" class="form-control" required>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </div>


                                        <div class="row">


                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('admin/user.password') }}
                                                    :</label>
                                                <input id="Name" type="password" name="password" class="form-control" required>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </div>


                                        <div class="modal-footer">





                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('admin/user.close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-success">{{ trans('admin/user.submit') }}</button>
                                            </div>

                                        </div>
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
