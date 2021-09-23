@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/role.roles') }}
@endsection
@section('content')



    <!--=================================
                             Main content -->
    <!-- main-content -->
    <!-- row -->
    <div class="row">

        {{-- @include('admin.include.alerts.success')
        @include('admin.include.alerts.errors') --}}

        @include('sweetalert::alert')

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">






                    <a href="" class="btn btn-success" data-toggle="modal"
                        data-target="#exampleModal">
                        {{ trans('admin/role.addrole') }}
                    </a>



                    <br><br>
                    <h1>{{ trans('admin/role.roles') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('admin/role.name') }}</th>
                                    <th>{{ trans('admin/permission.permissions') }}</th>
                                    <th>{{ trans('admin/role.action') }}</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $lng = app()->getLocale();
                                ?>

                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        
                                        <td>
                                            <div class="tags small">
                                                <p>


                                                    @foreach($role->permissions as $permission)
                                                        <a title="" href="" class="color5">{{ $permission->name }}</a>
                                                    @endforeach


                                                </p>
                                            </div>
                                        
                                        </td>

                                        <td>

                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $role->id }}"
                                            title="{{ trans('admin/products.edit') }}"><i
                                            class="fa fa-edit"></i></button>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $role->id }}"
                                                title="{{ trans('admin/role.delete') }}"><i
                                                    class="fa fa-trash"></i>
                                            </button>

                                        </td>
                                    </tr>


                                    {{-- edit --}}
                                    <div class="modal fade" id="edit{{ $role->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                       id="exampleModalLabel">
                                                       {{ trans('admin/role.edit_role') }}
                                                   </h5>
                                                   <button type="button" class="close" data-dismiss="modal"
                                                           aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>
                                               </div>
                                               <div >
                                                   <!-- add_form -->
                                                
                                                   <form action="{{ route('admin.role.update',$role->id) }}" method="POST">
                                                    @method('put')
                                                    @csrf
            
                                                    {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}
            
                                                    <div class="row">
            
            
                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">{{ trans('admin/role.name') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="name" value="{{$role->name}}" class="form-control" required>
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
            
                                                    <div class="row">
                                                        @foreach ($permissions as $permission)
                                                        <div class="col-3">
                                                            <div class="form-check">

                                                                
                                                                

                                                                <input class="form-check-input" 
                                                                        type="checkbox" 
                                                                        value="{{$permission->id}}"
                                                                        @foreach($role->permissions as $p)
                                                                        {{-- {{$permission->id}} --}}
                                                                        @if ($permission->id == $p->id) checked @endif 
                                                                        @endforeach
                                                                        
                                                                        name="name_permission[]" 
                                                                        id="flexCheckDefault"
                                                                >

                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                  {{$permission->name}}
                                                                </label>

                                                              </div> 



                                                              
                                                            
                                                        </div>
                                                       
                                                        @endforeach
                                                        
                                                         
                                                    </div>
            
                                                  
            
            
                                                    <div class="modal-footer">
            
            
            
            
            
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('admin/role.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-success">{{ trans('admin/role.submit') }}</button>
                                                        </div>
            
                                                    </div>
                                                </form>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                    {{-- edit --}}

                                    <!-- delete_modal_car -->

                                    <!-- delete_modal_Category -->
                                    <div class="modal fade" id="delete{{ $role->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/role.delete') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.role.destroy', $role->id) }}"
                                                        method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        {{ trans('admin/role.warning_message') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $role->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('admin/role.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('admin/role.delete') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- delete_modal_role-->



                                @endforeach

                        </table>

                        {{-- {{ $role->links() }} --}}

                    </div>



                    {{-- add --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="exampleModalLabel">
                                        {{ trans('admin/role.addrole') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('admin.role.store') }}" method="POST">
                                        @csrf

                                        {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}

                                        <div class="row">


                                            <div class="col">
                                                <label for="Name" class="mr-sm-2">{{ trans('admin/role.name') }}
                                                    :</label>
                                                <input id="Name" type="text" name="name" class="form-control" required>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">

                                          

                                            @foreach ($permissions as $permission)
                                            <div class="col-3">
                                                <div class="form-check">
                                               
                                                    <input class="form-check-input" type="checkbox" value="{{$permission->id}}" name="name_permission[]" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                      {{$permission->name}}
                                                    </label>
                                                    
                                                    


                                                  </div> 
                                            </div>
                                           
                                            @endforeach
                                            
                                             
                                        </div>

                                      


                                        <div class="modal-footer">





                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('admin/role.close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-success">{{ trans('admin/role.submit') }}</button>
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

<script>
    function AllChecked(){
     $('.checkbox').attr("checked");
  }


  $('.all_checked').on('click', function () {
    const allCheckedCheckbox = $(this);
    $('.checkbox').each(function () {
        $(this).prop('checked', allCheckedCheckbox.prop('checked'));
    });
});


$("#selectAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);     
    });
</script>
