<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Subcategories = SubCategory::paginate(5);
        return view('admin.subcategory.index' , compact('Subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('errors.404');

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


        SubCategory::create([
            'sub_category_name_ar' =>$request->name_ar  ,
            'sub_category_name_en' =>$request->name_en  ,
            'user_id' => auth()->user()->id,
        ]);


        }catch (\Exception $e){
            return redirect()->route('admin.subcategories.index')->with('warning',trans('admin/subcategories.error_message'));

        }
        return redirect()->route('admin.subcategories.index')->with('success' , trans('admin/subcategories.success_message'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('errors.404');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('errors.404');
        
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
        try{


            $subcategory = SubCategory::findOrFail($id);
            $subcategory->update([
                'sub_category_name_ar' =>$request->name_ar  ,
                'sub_category_name_en' =>$request->name_en  ,

            ]);


            }catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
            return redirect()->route('admin.subcategories.index')->with('update' , trans('admin/subcategories.update_message'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        return redirect()->route('admin.subcategories.index')->with('delete' ,  trans('admin/subcategories.delete_message'));

    }
}
