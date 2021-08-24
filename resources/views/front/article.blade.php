@extends('front.layout.layout')
@section('title')
    {{ trans('front/header.Articles') }}
@endsection
@section('content')
    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h3>{{ trans('front/header.Articles') }}</h3>
            <h4><a href="{{route('AbuEskandar.home')}}">{{ trans('front/header.Home') }}</a><label>/</label>
                <a href="{{route('AbuEskandar.articles')}}">{{ trans('front/header.Articles') }}</a><label>/</label>{{ trans('front/header.Article') }}
            </h4>
        </div>
    </div>
    <div class="clearfix"> </div>


    <?php
    $lng = app()->getLocale();
    ?>

    <!-- article -->
    <div class="container">
        <div class="articles">
            {{-- @foreach ($articles as $article) --}}
            <div class="row">
                <img src="{{ asset('upload/admin/article/' . $article->image) }}" style="width: 100%;height:350px" alt="">

            </div>
            <div class="content">

                <h5 class="card-title">{{ $article->{'article_name_' . $lng} }}</h5>
                <p class="card-text">{{ $article->{'content_' . $lng} }}</p>



            </div>





        </div>
        {{-- @endforeach --}}







    </div>
    </div>

    <!-- //article -->

@endsection
