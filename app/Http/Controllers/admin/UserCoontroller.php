<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Exception;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class UserCoontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users= User::orderBy('id','desc')->paginate(5);
    //    return $users;
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        try{
            User::create([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'roles_name' => $request->roles_name ,
                'status' => 1
            ]);

            return redirect()->route('admin.users.index')->with('success',trans('admin/user.success_message'));
        }catch (\Throwable $e){
            return redirect()->back()->withErrors(['errors' => 'اسم المستخدم موجود مسبقا']);
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
        // return $request->status;
        $password ='';
        if($request->password == NULL){
            $user=User::find($id);
            $password=$user->password;
        }else{
            $password= Hash::make($request->password);
        }

        if($request->name == NULL){
            $user=User::find($id);
            $name=$user->name;
        }else{
            $name= $request->name;
        }
        $status='';
        if($request->has('status') == 1){
            $status =1;
        }else{
            $status =0;
        }

        User::find($id)->update([
            'name' => $name,
            'password' =>$password ,
            'roles_name' => $request->roles_name,
            'status' => $status

        ]);

        return redirect()->route('admin.users.index')->with('success',trans('admin/user.update_message'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.users.index')->with('succes' ,trans('admin/user.delete_message'));
    }
}
