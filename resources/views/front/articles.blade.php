@extends('front.layout.layout')
@section('title')
    {{ trans('front/header.Articles') }}
@endsection
@section('content')
    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h3 style="font-family: 'Amiri', serif ">{{ trans('front/header.Articles') }}</h3>
            <h4><a
                    href="index.html">{{ trans('front/header.Home') }}</a><label>/</label>{{ trans('front/header.Articles') }}
            </h4>
        </div>
    </div>
    <div class="clearfix"> </div>


    <?php
    $lng = app()->getLocale();
    ?>

<br>
<br>
    <!-- article -->
<div class="container">
    <h1  style="font-family: 'Amiri', serif ">{{ trans('front/header.Articles') }}</h1>

    <div class="articles">
        @foreach ($articles as $article)
        <div class="row">
            <div class="col-sm-4">
                <div class="card-body">
                 <img src="{{asset('upload/admin/article/'.$article->image)}}" style="width: 95%;height:170px" alt="">
              </div>
            </div>

            <div class="col-sm-8">
                <div class="card-body">
                  <h5 style="font-family: 'Amiri', serif;" class="card-title" >{{ $article->{'article_name_' . $lng} }}</h5>
                  <p class="card-text">{{$article->{'description_' . $lng} }}</p>


                  <a href="{{route('AbuEskandar.article',$article->id)}}" class="btn btn-primary">{{ trans('admin/article.more') }}</a>
                </div>
            </div>

        </div>
        @endforeach







    </div>
</div>

    <!-- //article -->

@endsection
