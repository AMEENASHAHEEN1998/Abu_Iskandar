<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Category::orderBy('id' , 'desc')->get();
        $Subcategories = SubCategory::orderBy('id' , 'desc')->get();
        return view('admin.products.create' )->with(['Categories' => $Categories , 'Subcategories' => $Subcategories ]);
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

            $product_image_ex = $request->file('image')->getClientOriginalExtension();
            $product_image_name = 'Abu_Iskandar_' .time() . '_'. rand() . '.'. $product_image_ex;

            $List_size_prise = $request->List_size_prise;
            foreach($List_size_prise as $size_price){
                $product = Product::create([
                    'product_name_ar' => $request->product_name_ar,
                    'product_name_en' => $request->product_name_en,
                    'image' => $product_image_name,
                    'sizes' => $size_price['size'],
                    'price' => $size_price['price'],
                    'user_id' => auth()->user()->id,
                    'category_id' => $request->category_id ,
                    'views' => 0,
                ]);
            }

            $List_subcategory = $request->List_subcategory;

            foreach ($List_subcategory as $subcategory){
              Product::Subcategory()->create([
                    'subcategory_id' => $subcategory['sub_category_id'],
                    'product_id' => $product->id,
              ]);
          }

        $request->file('image')->move(public_path('uploads') , $product_image_name);

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('admin.products.index')->with('success' , trans('admin/products.success_message'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
