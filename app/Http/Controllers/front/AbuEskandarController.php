<?php

namespace App\Http\Controllers\front;

use App\Models\price;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbuEskandarController extends Controller
{
    public function index()
    {
        // $Categories = Category::orderBy('id' , 'desc')->get();
        return view('front.index');
    }
    public function about()
    {
        return view('front.about');
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function offer()
    {
        return view('front.offer');
    }

    public function show_category($id)
    {
        $CategoryImage = Category::where('id' , $id)->get();
        // dd($CategoryImage);
        $Products = Product::where('category_id' , $id)->orderBy('id' , 'desc')->get();
       //dd(price::where('product_id' , 1)->get());
        return view('front.show_category')->with(['Products' => $Products , 'CategoryImage' => $CategoryImage]);
    }
}
