<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\price;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories = Category::orderBy('id' , 'desc')->get();
        $Subcategories = SubCategory::orderBy('id' , 'desc')->get();
        $Products  = Product::orderBy('id' , 'desc')->DISTINCT('product_name_en')->paginate(10);

        return view('admin.products.index')->with(['Categories' => $Categories , 'Subcategories' => $Subcategories , 'Products' => $Products  ]);
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

            $product = Product::create([
                'product_name_ar' => $request->product_name_ar,
                'product_name_en' => $request->product_name_en,
                'decription'  => $request->decription,
                'image' => $product_image_name,
                'user_id' => auth()->user()->id,
                'category_id' => $request->category_id ,
                'views' => 0,
            ]);

            $List_size_prise = $request->List_size_prise;
            foreach($List_size_prise as $size_price){
                price::create([
                    'product_id' => $product->id,
                    'product_number' => $size_price['product_number'],
                    'size' => $size_price['size'],
                ]);
            }

            $List_subcategory = $request->List_subcategory;
            $product = Product::findOrFail($product->id);
            foreach ($List_subcategory as $subcategory){
                DB::insert('insert into products_subcategories (subcategory_id, product_id)
                values (?, ?)', [$subcategory['sub_category_id'], $product->id]);

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
        try{
            //dd($request->all());
            $product = Product::findOrFail($id);
            $product_image_name = $product->image;
            if ($request->file('image')) {
                $product_image_ex = $request->file('image')->getClientOriginalExtension();
                $product_image_name = 'Abu_Iskandar_' .time() . '_'. rand() . '.'. $product_image_ex;
                $request->file('image')->move(public_path('uploads') , $product_image_name);
            }

            $product->update([
                'product_name_ar' => $request->product_name_ar,
                'product_name_en' => $request->product_name_en,
                'image' => $product_image_name,
                'category_id' => $request->category_id ,
            ]);

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('admin.products.index')->with('update' , trans('admin/products.update_message'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('delete' ,  trans('admin/products.delete_message'));

    }

    public function get_products($id){
        $products = DB::table('products')->where('category_id' , $id)->where('deleted_at' , NULL)->pluck('product_name_ar' , 'id');

        return json_encode($products);
    }
}
