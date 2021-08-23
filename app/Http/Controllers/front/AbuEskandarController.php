<?php

namespace App\Http\Controllers\front;

use App\Models\price;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Distributor;
use App\Models\Job;
use App\Models\Offer;
use Illuminate\Http\Request;


class AbuEskandarController extends Controller
{
    public function index()
    {


        $offers=Offer::where('status_value',1)->skip(0)->take(4)->get();
        return view('front.index',compact('offers'));
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
        $offers=Offer::where('status_value',1)->get();
        // return $offers;

        return view('front.offer',compact('offers'));
    }
    public function Employment_applications()
    {
        $jobs=Job::where('job_declaration','yes')->get();
        return view('front.Employmentapplications',compact('jobs'));
    }
    public function requestjob($id)
    {
        $job=Job::find($id);
        // return $job;
       return view('front.requestjob',compact('job'));
    }

    public function show_category($id)
    {
        $CategoryImage = Category::where('id' , $id)->get();
        // dd($CategoryImage);
        $Products = Product::where('category_id' , $id)->orderBy('id' , 'desc')->get();
       //dd(price::where('product_id' , 1)->get());
        return view('front.show_category')->with(['Products' => $Products , 'CategoryImage' => $CategoryImage]);
    }


    public function articles(){

        $articles=Article::all();
        return view('front.articles',compact('articles'));
    }
    public function article($id){
        $article=Article::find($id);

        return view('front.article',compact('article'));

    }
    public function distributor()
    {
        $distributes=Distributor::all()->groupBy('place');
        // dd($distributes);
        return view('front.distributor',compact('distributes'));
    }
}
