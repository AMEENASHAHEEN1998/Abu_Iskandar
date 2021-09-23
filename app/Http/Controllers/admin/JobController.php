<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs=Job::orderBy('id','desc')->paginate(5);
        return view('admin.job.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        try {
            $file_name ='job.jpg';
            if($request->has('image')){
                $FileEx=$request->file('image')->getClientOriginalExtension();
                $file_name=time().'_'.rand().'.'.$FileEx;
                $request->file('image')->move(public_path('upload/admin/job'),$file_name);
            }
            // return $file_name;
            Job::create([
                'user_id' => $request->user_id,
                'job_name_ar'  => $request->job_name_ar,
                'job_name_en' => $request->job_name_en,
                'job_description_ar' => $request->job_description_ar,
                'job_description_en' => $request->job_description_en,
                'image' => $file_name,
                // 'job_declaration' => 'no',
                'status' => 'مفعل',
                'status_value' => 1,
                'views' => 0,
                'created_at' => now(),
    
            ]);
    
            return redirect()->route('admin.job.index')->with('success' , trans('admin/job.success_message'));
    
        } catch (\Throwable $th) {
            return redirect()->route('admin.job.index')->with('warning', trans('admin/job.error_message'));
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $job=Job::find($id);
        return view('admin.job.show',compact('job'));
    }


    public function edit($id)
    {
        $job=Job::find($id);
        return view('admin.job.edit',compact('job'));
    }


    public function update(JobRequest $request, $id)
    {
        // return $request;
        if ($request->has('status_value') == 1) {
            $request->status_value = 1;
            $status = 'مفعل';
        } else {
            $request->status_value = 0;
            $status = 'غير مفعل ';
        }


        $job = Job::findOrFail($id);
        $image_name = $job->image;

        if ($request->has('image')) {
            $FileEx=$request->file('image')->getClientOriginalExtension();
            $image_name=time().'_'.rand().'.'.$FileEx;
            $request->file('image')->move(public_path('upload/admin/job'),$image_name);
        }
        // else{
        //     $image_name ='upload/admin/job/job.jpg';
        // }
        job::find($id)->update([
            'user_id' => $request->user_id,
            'job_name_ar'  => $request->job_name_ar,
            'job_name_en' => $request->job_name_en,
            'job_description_ar' => $request->job_description_ar,
            'job_description_en' => $request->job_description_en,
            // 'job_declaration' => $request->job_declaration,
            'image' => $image_name,
            'status' => $status,
            'status_value' => $request->status_value,
            'updated_at' => now(),

        ]);
        return redirect()->route('admin.job.index')->with('success' , trans('admin/job.update_message'));

    }

    public function destroy($id)
    {
        Job::findOrFail($id)->delete();
        return redirect()->route('admin.job.index')->with('success' , trans('admin/job.update_message'));

    }
    public function activejob(){
        $jobs=Job::where('status_value',1)->paginate(5);
        return view('admin.job.active',compact('jobs'));
    }
    public function noactivejob(){
        $jobs=Job::where('status_value',0)->paginate(2);
        return view('admin.job.noactive',compact('jobs'));
    }
}
