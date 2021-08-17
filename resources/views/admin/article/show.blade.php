@extends('admin.layouts.master')
@section('title')
    {{ trans('admin/article.article') }}
@endsection
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

                    <a href="{{ route('admin.article.index') }}" class="btn btn-success">
                        Back
                    </a>

                    <div>
                        <hr>

                        <h1> {{ trans('admin/article.detail_article') }} </h1>

                    </div>

                    <hr>

                    <?php
                    $lng = app()->getLocale();
                    ?>

                    <div>
                        <h3> <i class="fa fa-angellist"></i>
                            {{ trans('admin/article.article_name') }}
                            <strong> : {{ $article->{'article_name_' . $lng} }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3><i class="fa fa-angellist"></i>
                            {{ trans('admin/article.description') }}
                            <strong> : {{ $article->{'description_' . $lng} }}</strong>
                        </h3>
                    </div>
                    <hr>

                    <div>
                        <h3><i class="fa fa-angellist"></i>
                            {{ trans('admin/article.content') }}
                            <strong> : {{ $article->{'content_' . $lng} }}</strong>
                        </h3>
                    </div>
                    <hr>


                    <div>
                        <h3><i class="fa fa-angellist"></i>
                            {{ trans('admin/article.status') }} <strong> :
                                {{ $article->status == 0 ? trans('admin/article.noactive') : trans('admin/article.active') }}</strong>
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
