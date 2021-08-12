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

                    <a href="{{ route('admin.offer.index') }}" class="btn btn-success">
                        Back
                    </a>

                    <div>
                        <hr>

                        <h1> {{ trans('admin/offer.detail_offer') }} </h1>

                    </div>

                    <hr>

                    <?php
                    $lng = app()->getLocale();
                    ?>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/offer.offer_title') }}
                            <strong> : {{ $offer->{'offer_title_' . $lng} }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3><i class="fa fa-angellist"></i>
                            {{ trans('admin/offer.description') }}
                            <strong> : {{ $offer->{'description_' . $lng} }}</strong>
                        </h3>
                    </div>
                    <hr>


                    <div>
                        <h3><i class="fa fa-angellist"></i>
                            {{ trans('admin/offer.price') }} <strong> :
                                {{ $offer->price }}</strong></h3>
                    </div>

                    <hr>
                    <div>
                        <h3><i class="fa fa-angellist"></i>
                            {{ trans('admin/offer.status') }} <strong> :
                                {{ $offer->status == 0 ? trans('admin/offer.noactive') : trans('admin/offer.active') }}</strong>
                        </h3>
                    </div>

                    <hr>


                </div>
            </div>
        </div>





    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
