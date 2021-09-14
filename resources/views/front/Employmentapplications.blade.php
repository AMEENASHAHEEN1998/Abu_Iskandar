@extends('front.layout.layout')
@section('title')
    {{ trans('front/header.Job') }}
@endsection
@section('content')
    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h3 style="font-family: 'Amiri', serif ;">{{ trans('front/header.Job') }}</h3>
            <h4 style="font-family: 'Amiri', serif ;"><a href="index.html">{{ trans('front/header.Home') }}</a><label>/</label>{{ trans('front/header.Job') }}
            </h4>
        </div>
    </div>
    <div class="clearfix"> </div>


    <!-- contact -->
    <div class="jobs">
        <div class="container">
            <?php
            $lng = app()->getLocale();
            ?>

            <div class="row">
                @if ($jobs->count() >= 1)

                    @foreach ($jobs as $job)


                        <a href="{{ route('AbuEskandar.requestjob', $job->id) }}">
                            <div class="card" style="width: 24rem;margin:10px">
                                {{-- <a href=""> --}}
                                <img class="card-img-top"
                                    src="{{ $job->image ? asset('upload/admin/job/' . $job->image) : asset('upload/admin/job/job.jpg') }}"
                                    {{-- alt="{{asset('/public/upload/admin/job/job.jpg') }}" --}}>
                                <div class="card-body">
                                    <h5 class="card-title" style="font-family: 'Amiri', serif ;">{{ $job->{'job_name_' . $lng} }}</h5>
                                    <p class="card-text" style="font-family: 'Amiri', serif ;">{{ $job->{'job_description_' . $lng} }}</p>
                                    <strong>{{ $job->updated_at->format('d-m-Y') }}</strong>
                                </div>
                                {{-- </a> --}}
                            </div>
                        </a>


                    @endforeach
                @else
                <div class="card" style="width: 24rem;margin:10px">

                    <h2 class="text-center"><span>
                            لا يوجد طلبات لعرضها </span></h2>
                </div>
                @endif








            </div>

        </div>
    </div>
    </div>
    <!-- //contact -->

@endsection
