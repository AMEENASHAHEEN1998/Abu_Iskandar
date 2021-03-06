@extends('front.layout.layout')
@section('title')
    {{ trans('front/header.Job') }}
@endsection
@section('content')
    <!--banner-->
    <div class="banner-top" >
        <div class="container">

            <h3 >{{ trans('front/header.Job') }}</h3>
            <h4 ><a href="index.html">{{ trans('front/header.Home') }}</a><label>/</label>{{ trans('front/header.Job') }}

            </h4>
        </div>
    </div>
    <div class="clearfix"> </div>

<br>
<br>
    <!-- contact -->
    <div class="jobs">
        <div class="container">
            <?php
            $lng = app()->getLocale();
            ?>
    <h1  >{{ trans('front/header.Job') }}</h1>

            <div class="row">
                @if ($jobs->count() >= 1)

                    @foreach ($jobs as $job)


                        <a href="{{ route('AbuEskandar.requestjob', $job->id) }}">
                            <div class="card" style="width: 24rem;margin:10px">
                                {{-- <a href=""> --}}
                                <img class="card-img-top" style="height:170px"
                                    src="{{ $job->image ? asset('upload/admin/job/' . $job->image) : asset('upload/admin/job/job.jpg') }}"
                                    {{-- alt="{{asset('/public/upload/admin/job/job.jpg') }}" --}}>
                                <div class="card-body">
                                    <h5 class="card-title" >{{ $job->{'job_name_' . $lng} }}</h5>
                                    <p class="card-text" >{{ $job->{'job_description_' . $lng} }}</p>
                                    <strong>{{ $job->created_at->diffForHumans()  }}</strong>
                                </div>
                                {{-- </a> --}}
                            </div>
                        </a>


                    @endforeach
                @else
                <div class="card" style="width: 24rem;margin:20px">

                    <p style="font-size: 22px">لا يوجد وظائف حاليا لعرضها </p>

                </div>
                @endif








            </div>

        </div>
    </div>
    </div>
    <!-- //contact -->

@endsection
