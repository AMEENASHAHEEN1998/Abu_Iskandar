<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categorys = Category::paginate(5);
        return view('admin.category.index', compact('Categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{
            // $request->validate([
            //     'category_name_ar' => 'required|unique:categories|max:155',
            //     'category_name_en' => 'required|unique:categories|max:155',
            // ]);
            $category_image_ex = $request->file('image')->getClientOriginalExtension();
            $category_image_name = 'Abu_Iskandar_' .time() . '_'. rand() . '.'. $category_image_ex;


        Category::create([
            'category_name_ar' =>  $request->name ,
            'category_name_en' =>  $request->name_en,
            'image' => $category_image_name,
            'views' => 0,
            'user_id' => auth()->user()->id,
        ]);
        // dd($request->id);
        // $category = Category::where('category_name_ar' , $request->name );

        // $category->Image()->create([
        //     'url' => $category_image_name,
        //     'title' => 'Category Image',
        //     'alt' =>'Category Image',
        // ]);
        $request->file('image')->move(public_path('uploads') , $category_image_name);

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('admin.categories.index')->with('success' , trans('admin/categories.success_message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category_image_name = $category->image;
            //dd($request);
            if ($request->file('image')) {
                $category_image_ex = $request->file('image')->getClientOriginalExtension();
                $category_image_name = 'Abu_Iskandar_' .time() . '_'. rand() . '.'. $category_image_ex;
                $request->file('image')->move(public_path('uploads'), $category_image_name);
            }
            $category->update([
            'category_name_ar' =>  $request->name ,
            'category_name_en' =>  $request->name_en,
            'image' => $category_image_name,
        ]);
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('admin.categories.index')->with('update' , trans('admin/categories.update_message'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('delete' ,  trans('admin/categories.delete_message'));
    }
}
