<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
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
}
