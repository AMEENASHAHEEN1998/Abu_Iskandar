<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Product;
use App\Models\RequestJob;
use Illuminate\Http\Request;
use App\Models\DriverRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product=Product::all()->count();
        // return $product;
        $requestjob=RequestJob::where('status_value',1)->count();
        $offer=Offer::where('status_value',1)->count();
        $driverrequest=DriverRequest::where('status_value',0)->count();
        return view('admin.pages.index',compact('product','requestjob','offer','driverrequest'));
        // return view('admin.pages.index');
    }
}
