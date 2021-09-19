@extends('front.layout.layout')
@section('title')
    {{ trans('front/header.Articles') }}
@endsection
@section('content')
    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h3 >{{ trans('front/header.Articles') }}</h3>
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
        <h1 >{{ trans('front/header.Articles') }}</h1>

        <div class="articless">




            <div class="card-deck">
                <div class="row">

                @foreach ($articles as $article)


                        
                        <div class="col-md-4">
                            <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 22rem">
                                <img class="card-img-top" src="{{ asset('upload/admin/article/' . $article->image) }}"
                                    style=" height:170px" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $article->{'article_name_' . $lng} }}</h5>
                                    <p class="card-text">{{ $article->{'description_' . $lng} }}</p>
                                    
                                    <p class="card-text"><small
                                            class="text-muted">{{ $article->created_at->diffForHumans() }}</small></p>

                                            <br>
                                    <a href="{{ route('AbuEskandar.article', $article->id) }}"
                                        class="btn btn-primary">{{ trans('admin/article.more') }}</a>

                                </div>
                            </div>
                        </div>



                @endforeach
            </div>

            </div>






        </div>
    </div>

    <!-- //article -->

@endsection
