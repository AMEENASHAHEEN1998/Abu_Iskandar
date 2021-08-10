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


                    @include('admin.include.alerts.success')
                    @include('admin.include.alerts.errors')



                    <a href="{{ route('admin.offer.create') }}"  class="btn btn-success">
                     {{ trans('admin/dashboard.add_offer') }}
                    </a>



                    <br><br>
                    <h1>{{ trans('admin/offer.offer') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>{{ trans('admin/offer.id') }}</th>
                                    <th>{{ trans('admin/offer.user_id') }}</th>
                                    <th>{{ trans('admin/offer.offer_title') }}</th>
                                    <th>{{ trans('admin/offer.description') }}</th>
                                    <th>{{ trans('admin/offer.price') }}</th>
                                    <th>{{ trans('admin/offer.status') }}</th>
                                    <th>{{ trans('admin/offer.action') }}</th>


                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($offers as $offer)
                                    <tr>
                                        <td>{{ $offer->id }}</td>
                                        <td>{{ $offer->User->name }}</td>
                                        <td>{{ $offer->offer_title }}</td>
                                        <td>{{ $offer->description }}</td>
                                        <td>{{ $offer->price }}</td>
                                        <td>{{ $offer->status }}</td>

                                        <td>
                                            <a href="{{route('admin.offer.show',$offer->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('admin.offer.edit',$offer->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <form class="d-inline" action="{{ route('admin.offer.destroy', $offer->id) }}"
                                                method="POST">
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





    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
