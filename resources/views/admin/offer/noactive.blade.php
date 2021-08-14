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

                    <?php
                    $lng = app()->getLocale();
                   ?>

                    <br><br>
                    <h1>{{ trans('admin/offer.offer') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>{{ trans('admin/offer.id') }}</th>
                                    <th>{{ trans('admin/offer.user_name') }}</th>
                                    <th>{{ trans('admin/offer.offer_title') }}</th>
                                    <th>{{ trans('admin/offer.description') }}</th>
                                    <th>{{ trans('admin/offer.image') }}</th>
                                    <th>{{ trans('admin/offer.price') }}</th>
                                    <th>{{ trans('admin/offer.status') }}</th>
                                    <th>{{ trans('admin/offer.action') }}</th>


                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($offers as $offer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ ($offer->user) ? $offer->user->name : trans('admin/dashboard.none_user') }}</td>
                                        <td>{{ $offer->{'offer_title_' . $lng} }}</td>
                                        <td>{{ $offer->{'description_' . $lng} }}</td>
                                        <td>
                                            <img src="{{asset('upload/admin/offer/'.$offer->image)}}" style="width: 85px" alt="">

                                        </td>
                                        <td>{{ $offer->price }}</td>
                                        <td>
                                            @if($offer->status == 1)
                                                <button  class="btn btn-success">{{trans('admin/offer.active')}} </button>
                                            @endif
                                            @if($offer->status == 0)
                                                <button  class="btn btn-danger">{{trans('admin/offer.noactive')}} </button>
                                            @endif


                                        </td>

                                        <td>
                                            <a href="{{route('admin.offer.show',$offer->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('admin.offer.edit',$offer->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $offer->id }}"
                                            title="{{ trans('admin/offer.delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                         <!-- delete_modal_distributortype -->
                                           <!-- delete_modal_Category -->
                                           <div class="modal fade" id="delete{{ $offer->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('admin/offer.delete_offer') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('admin.offer.destroy',$offer->id)}}" method="post">
                                                            {{method_field('Delete')}}
                                                            @csrf
                                                            {{ trans('admin/offer.warning_offer') }}
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                    value="{{ $offer->id }}">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('admin/offer.close') }}</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger">{{ trans('admin/offer.delete') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        <!-- delete_modal_offertype -->
                                @endforeach

                        </table>
                        {{$offers->links()}}

                    </div>
                </div>
            </div>
        </div>





    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
