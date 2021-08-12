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



                    <a href="{{ route('admin.article.create') }}"  class="btn btn-success">
                     {{ trans('admin/article.add_article') }}
                    </a>

                    <?php
                    $lng = app()->getLocale();
                   ?>

                    <br><br>
                    <h1>{{ trans('admin/article.article') }}</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>{{ trans('admin/article.id') }}</th>
                                    <th>{{ trans('admin/article.user_name') }}</th>

                                    <th>{{ trans('admin/article.article_title') }}</th>
                                    <th>{{ trans('admin/article.description') }}</th>
                                    <th>{{ trans('admin/article.date') }}</th>

                                    <th>{{ trans('admin/article.status') }}</th>
                                    <th>{{ trans('admin/article.action') }}</th>


                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($articles as $article)
                                    <tr>
                                        <td>{{ $article->id }}</td>
                                        <td>{{ $article->user->name}}</td>
                                        <td>{{ $article->{'article_name_' . $lng} }}</td>
                                        <td>{{ $article->{'description_' . $lng} }}</td>
                                        <td>{{ $article->created_at }}</td>

                                        <td>
                                            @if($article->status_value == 1)
                                                <button  class="btn btn-success">{{trans('admin/article.active')}} </button>
                                            @endif
                                            @if($article->status_value == 0)
                                                <button  class="btn btn-danger">{{trans('admin/article.noactive')}} </button>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{route('admin.article.show',$article->id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('admin.article.edit',$article->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <form class="d-inline" action="{{ route('admin.article.destroy', $article->id) }}"
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
