<?php

namespace App\Http\Controllers\admin;

use App\Models\Job;
use App\Models\RequestJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestJobRequest;

class RequestJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $requestjobs=RequestJob::find(1);
        $requestjob=RequestJob::orderBy('id','desc')->paginate(5);
        // dd($requestjobs);
        return view('admin.requestjob.index',compact('requestjob'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $job=Job::find($id);
        // return $job;
        // return view('admin.requestjob.create');
    }

    public function createjob($id){
        $jobid=Job::find($id);
        // return $job;
        return view('admin.requestjob.create',compact('jobid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestJobRequest $request)
    {
        // return $request;

        $personal_image ='' ;

        if ($request->has('image')) {
            $FileEx=$request->file('image')->getClientOriginalExtension();
            $personal_image=time().'_'.rand().'.'.$FileEx;
            $request->file('image')->move(public_path('upload/admin/requestjob'),$personal_image);
        }

        RequestJob::create([
            'name'  =>$request->name,
            'specialization'  =>$request->specialization,
            'university' =>$request->university,
            'comments_user' =>$request->comments_user,
            'phone_number' =>$request->phone_number,
            'Date_of_Birth' =>$request->Date_of_Birth,
            'address' =>$request->address,
            'status' =>'قيد الانتظار',
            'status_value' =>1,
            'personal_image' =>$personal_image,
            'job_id' =>  $request->job_id,
            'user_id' => $request->user_id,
            'comments_admin' =>'',
            'start_date' => '',
        ]);
        return redirect()->route('AbuEskandar.Employment_applications')->with('success' , trans('admin/requestjob.success_message'));
        // return redirect()->route('admin.requestjob.index')->with('success' , trans('admin/requestjob.success_message'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requestjob=RequestJob::find($id);
        return view('admin.requestjob.show',compact('requestjob'));
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
        // return $request->comments_admin;
        try {

            $status_value ='' ;
            if($request->status == 0){
                $status_value ='مرفوض' ;
                $start_date ='';
            }elseif($request->status == 1){
                $status_value ='قيد الانتظار' ;
                $start_date='';
            }elseif($request->status == 2){
                $status_value ='مقبول' ;
                $start_date=$request->start_date;
            }

            RequestJob::find($id)->update([
                'status'=> $status_value,
                'status_value' =>$request->status ,
                'comments_admin'=> $request->comments_admin,
                'start_date'=> $start_date,

            ]);
            return redirect()->route('admin.requestjob.index')->with('success' , trans('admin/requestjob.update_message'));
        } catch (\Throwable $th) {
            return redirect()->route('admin.requestjob.index')->with('error' , trans('admin/requestjob.update_message_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RequestJob::find($id)->delete();
        return redirect()->route('admin.requestjob.index')->with('success' , trans('admin/requestjob.delete_message'));

    }
    public function activerequestjob()
    {
        $requestjob=RequestJob::where('status_value',2)->orderBy('id','desc')->paginate(5);
        return view('admin.requestjob.active',compact('requestjob'));
    }
    public function noactiverequestjob()
    {
        $requestjob=RequestJob::where('status_value',0)->orderBy('id','desc')->paginate(5);
        return view('admin.requestjob.noactive',compact('requestjob'));
    }
    public function waitrequestjobs()
    {
        $requestjob=RequestJob::where('status_value',1)->orderBy('id','desc')->paginate(5);
        return view('admin.requestjob.wait',compact('requestjob'));
    }
}
