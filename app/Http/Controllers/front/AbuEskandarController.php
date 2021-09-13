<?php

namespace App\Http\Controllers\front;

use App\Models\Job;
use App\Models\Offer;
use App\Models\price;
use App\Models\Article;
use App\Models\Product;
use App\Mail\MyTestMail;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Distributor;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class AbuEskandarController extends Controller
{
    public function index()
    {

 
        
        $offers=Offer::where('status_value',1)->skip(0)->take(4)->get();
        $employes=Employee::where('status_value',1)->latest()->take(4)->get();
        return view('front.index',compact('offers','employes'));
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
        $jobs=Job::where('status_value','1')->get();
        return view('front.Employmentapplications',compact('jobs'));
    }
    public function requestjob($id)
    {
        $job=Job::find($id);
        $view =$job->views +1 ;


        Job::find($id)->update([
            'views' => $view,
        ]);

        $job=Job::find($id);
        // return $job;
       return view('front.requestjob',compact('job'));
    }

    public function show_category($id)
    {
        $CategoryImage = Category::where('id' , $id)->get();
        // dd($CategoryImage);
        // $Products = Product::where('category_id' , $id)->orderBy('id' , 'desc')->get();
        $Products = Product::where('category_id' , $id)->orderBy('id' , 'desc')->paginate(20);
       //dd(price::where('product_id' , 1)->get());
        return view('front.show_category')->with(['Products' => $Products , 'CategoryImage' => $CategoryImage]);
    }


    public function articles(){

        $articles=Article::all();
        return view('front.articles',compact('articles'));
    }
    public function article($id){
        $article=Article::find($id);
        $view =$article->views +1 ;


        Article::find($id)->update([
            'views' => $view,
        ]);
        // return $article->views;
        // $articleDB::update('views', );

        return view('front.article',compact('article'));

    }
    public function distributor()
    {
        $distributes=Distributor::all()->groupBy('place');
        // dd($distributes);
        return view('front.distributor',compact('distributes'));
    }

    public function update_product_view(Request $request, $id)
    {
        //dd($request->all());
        $Product = Product::findOrFail($id);
        $Product->update([
            'views' => $request->views ,
        ]);
        return redirect()->route('AbuEskandar.show_category' , [$request->category_id]);
    }
    public function mail(Request $request){
        // return $request;
        $details = [
            'Name' => $request->Name,
            'Email' => $request->Email,
            'Message' => $request->Message,
        ];
       
        Mail::to('up120161676@gmail.com')->send(new \App\Mail\MyTestMail($details));
        return redirect()->back();
       
    }
}
