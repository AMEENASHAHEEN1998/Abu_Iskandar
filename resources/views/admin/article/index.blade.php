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
        @include('admin.include.alerts.success')
        @include('admin.include.alerts.errors')
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">






                    <a href="{{ route('admin.article.create') }}" class="btn btn-success">
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
                                    <th>{{ trans('admin/article.image') }}</th>
                                    <th>{{ trans('admin/article.date') }}</th>

                                    <th>{{ trans('admin/article.status') }}</th>
                                    <th>{{ trans('admin/article.action') }}</th>


                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($articles as $article)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $article->user ? $article->user->name : trans('admin/dashboard.none_user') }}
                                        </td>
                                        <td>{{ $article->{'article_name_' . $lng} }}</td>
                                        <td>{{ $article->{'description_' . $lng} }}</td>
                                        <td>
                                            <img src="{{ asset('upload/admin/article/' . $article->image) }}"
                                                style="width: 85px" alt="">
                                        </td>

                                        <td>{{ $article->created_at->format('d-m-Y') }}</td>

                                        <td>
                                            @if ($article->status_value == 1)
                                                <p style="color: green">{{ trans('admin/article.active') }}
                                                </p>
                                            @endif
                                            @if ($article->status_value == 0)
                                                <p style="color: red">{{ trans('admin/article.noactive') }}
                                                </p>
                                            @endif
                                        </td>

                                        <td>


                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#exampleModalshow{{ $article->id }}"
                                                title="{{ trans('admin/users.edit') }}">
                                                <i class="fa fa-eye"></i>
                                            </button>


                                            {{-- <a href="{{ route('admin.article.show', $article->id) }}"
                                                class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> --}}


                                            <a href="{{ route('admin.article.edit', $article->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>


                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $article->id }}"
                                                title="{{ trans('admin/article.delete') }}"><i
                                                    class="fa fa-trash"></i></button>








                                        </td>
                                    </tr>

                                       <!-- edit_modal_users -->

                                       <div class="modal fade" id="exampleModalshow{{ $article->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/article.detail_article') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <!-- add_form -->
                                                    <form
                                                        method="POST">
                                                        @method('put')
                                                        @csrf

                                                        <div class="row">
                                                            <img src="{{ asset('upload/admin/article/' . $article->image) }}" style="width: 100%;height:150px" alt="">

                                                        </div>
                                                        <div class="content">

                                                            <h5 class="card-title">{{ $article->{'article_name_' . $lng} }}</h5>
                                                            <p class="card-text">{{ $article->{'content_' . $lng} }}</p>



                                                        </div>

                                                        <span>
                                                            <strong>{{$article->created_at->format('d-m-Y')}}</strong>
                                                        </span>


                                                        <div class="modal-footer">

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">{{ trans('admin/user.close') }}</button>
                                                            </div>

                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- edit_modal_car -->

                                    <!-- delete_modal_distributortype -->
                                    <!-- delete_modal_Category -->
                                    <div class="modal fade" id="delete{{ $article->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('admin/article.delete_article') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.article.destroy', $article->id) }}"
                                                        method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        {{ trans('admin/article.warning_article') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $article->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('admin/article.close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('admin/article.delete') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- delete_modal_articletype -->
                                @endforeach
                                {{ $articles->links() }}

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
