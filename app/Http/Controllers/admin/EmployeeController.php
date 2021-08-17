<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id','desc')->paginate(5);
        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $file=$request->file;
        $file_name='';
        if($request->has('image')){
            $FileEx=$request->file('image')->getClientOriginalExtension();
            $file_name=time().'_'.rand().'_'.$FileEx;
            $request->file('image')->move(public_path('upload/admin/employee'),$file_name);
        }



        Employee::create([
            'employee_name_ar' =>$request->employee_name_ar ,
            'employee_name_en' =>$request->employee_name_en ,
            'job_title_ar' =>$request->job_title_ar ,
            'job_title_en' =>$request->job_title_en ,
            'image' =>$file_name,
            'status' => 'مفعل',
            'status_value' => 1
        ]);

        return redirect()->route('admin.employee.index')->with('success' , trans('admin/employee.success_message'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee=Employee::find($id);
        return view('admin.employee.show',compact('employee'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee =Employee::find($id);
        return view('admin.employee.edit',compact('employee'));
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
        // return $request;

        if ($request->has('status') == 1) {
            $request->status_value = 1;
            $status = 'مفعل';
        } else {
            $request->status_value = 0;
            $status = 'غير مفعل ';

        }
        $employee = Employee::findOrFail($id);
        $image_name = $employee->image;

        if ($request->has('image')) {
            $FileEx=$request->file('image')->getClientOriginalExtension();
            $image_name=time().'_'.rand().'_'.$FileEx;
            $request->file('image')->move(public_path('upload/admin/employee'),$image_name);
        }

        Employee::find($id)->update([
            'employee_name_ar' =>$request->employee_name_ar ,
            'employee_name_en' =>$request->employee_name_en ,
            'job_title_ar' =>$request->job_title_ar ,
            'job_title_en' =>$request->job_title_en ,
            'image' =>$image_name,
            'status' => $status,
            'status_value' => $request->status_value
        ]);

        return redirect()->route('admin.employee.index')->with('success' , trans('admin/employee.update_message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect()->route('admin.employee.index')->with('success' , trans('admin/employee.delete_message'));

    }
}
