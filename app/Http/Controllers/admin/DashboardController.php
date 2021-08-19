<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DriverRequest;
use App\Models\Offer;
use App\Models\Product;
use App\Models\RequestJob;

class DashboardController extends Controller
{
    public function index()
    {
        // $product=Product::orderBy('id' , 'desc');
        // return $product;
        // $orderrequest=RequestJob::where('status_value',1)->count();
        // $offer=Offer::where('status_value',1)->count();
        // $driverrequest=DriverRequest::where('status_value',1)->count();
        // return view('admin.pages.index',compact('product','orderrequest','offer','driverrequest'));
    }
}
