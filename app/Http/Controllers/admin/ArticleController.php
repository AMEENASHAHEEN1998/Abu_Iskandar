<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id','desc')->paginate(5);
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
    }


    public function store(ArticleRequest $request)
    {

        try {
            $file_name='';
        if($request->has('image')){
            $FileEx=$request->file('image')->getClientOriginalExtension();
            $file_name=time().'_'.rand().'.'.$FileEx;
            $request->file('image')->move(public_path('upload/admin/article'),$file_name);
        }
        Article::create([
            'user_id' => $request->user_id,
            'article_name_ar'  => $request->article_name_ar,
            'article_name_en' => $request->article_name_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'content_ar' => $request->content_ar,
            'content_en' => $request->content_en,
            'image' => $file_name,
            'status' => 'مفعل',
            'status_value' => 1,
            'views' => 0,
            'created_at' => now(),

        ]);
        return redirect()->route('admin.article.index')->with('success' , trans('admin/article.success_message'));
    
        } catch (\Throwable $th) {
            return redirect()->route('admin.article.index')->with('warning',trans('admin/article.error_message'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=Article::find($id);
        // return $article;
        return view('admin.article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::find($id);
        // return $article;
        return view('admin.article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        // return $request;

        if ($request->has('status_value') == 1) {
            $request->status_value = 1;
            $status = 'مفعل';
        } else {
            $request->status_value = 0;
            $status = 'غير مفعل ';
        }



        $article = Article::findOrFail($id);
        $image_name = $article->image;

        if ($request->has('image')) {
            $FileEx=$request->file('image')->getClientOriginalExtension();
            $image_name=time().'_'.rand().'.'.$FileEx;
            $request->file('image')->move(public_path('upload/admin/article'),$image_name);
        }
        Article::find($id)->update([
            'user_id' => $request->user_id,
            'article_name_ar'  => $request->article_name_ar,
            'article_name_en' => $request->article_name_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'content_ar' => $request->content_ar,
            'content_en' => $request->content_en,
            'status' => $status,
            'image' => $image_name,
            'status_value' => $request->status_value,
            'updated_at' => now(),

        ]);
        return redirect()->route('admin.article.index')->with('success' , trans('admin/article.update_message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->route('admin.article.index')->with('success' , trans('admin/article.delete_message'));

    }
}
