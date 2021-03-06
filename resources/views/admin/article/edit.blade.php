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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <a href="{{ route('admin.article.index') }}" class="btn btn-success">
                        {{ trans('admin/dashboard.Back') }}
                    </a>

                    <hr>
                    <h2>{{ trans('admin/article.updatearticle') }}</h2>

                    <form action="{{ route('admin.article.update', $article->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="formGroupExampleInput">{{ trans('admin/article.article_name_ar') }}</label>
                                    <input type="text" name="article_name_ar" value="{{ $article->article_name_ar }}"
                                        class="form-control" id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('article_name_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="formGroupExampleInput">{{ trans('admin/article.article_name_en') }}</label>
                                    <input type="text" name="article_name_en" value="{{ $article->article_name_en }}"
                                        class="form-control" id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('article_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>





                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="formGroupExampleInput">{{ trans('admin/article.description_ar') }}</label>
                                    <input type="text" name="description_ar" value="{{ $article->description_ar }}"
                                        class="form-control" id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('description_ar')
                                <span class="text-danger">{{ $message }}</span>

                            @enderror

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label
                                        for="formGroupExampleInput">{{ trans('admin/article.description_en') }}</label>
                                    <input type="text" name="description_en" value="{{ $article->description_en }}"
                                        class="form-control" id="formGroupExampleInput">
                                </div>
                            </div>

                            @error('description_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror



                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('admin/article.content_ar') }}</label>
                                    <textarea type="text" name="content_ar" class="form-control"
                                        id="formGroupExampleInput">{{ $article->content_ar }}</textarea>
                                </div>
                            </div>

                            @error('content_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ trans('admin/article.content_en') }}</label>
                                    <textarea type="text" name="content_en" class="form-control"
                                        id="formGroupExampletextarea">{{ $article->content_en }}</textarea>
                                </div>
                            </div>

                            @error('content_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <input type="checkbox" name="status_value" class="switchery" data-color="success"
                                    value="{{ $article->status_value }}" @if ($article->status_value == 1) checked @endif />
                                <label for="switcheryColor4"
                                    class="card-title ml-1">{{ trans('admin/article.status') }}</label>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ trans('admin/article.image') }}</label>
                            <input type="file"  name="image" />
                            <img src="{{asset('upload/admin/article/'.$article->image)}}" style="width: 150px" alt="">

                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>






                        <button class="btn btn-success btn-lg">{{ trans('admin/article.save') }}</button>

                    </form>



                </div>
            </div>
        </div>



    </div>




    </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>
@endsection
