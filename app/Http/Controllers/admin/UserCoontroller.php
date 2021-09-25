<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserCoontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $role=Role::findById(1);
        // $user= User::find(6);
        // return $user->assignRole($role);

        // return  $user->roles->pluck('name');

        $users = User::orderBy('id', 'desc')->paginate(5);
        $roles = Role::all();
        //  return $users;
        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('errors.404');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // return $request->roles_name;
        try {
            $role = Role::findById($request->roles_name);
            // return $role->name;

            $user=User::create([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'roles_name' => $role->name,
                'status' => 1
            ]);

            $user->assignRole($role);

            return redirect()->route('admin.users.index')->with('success', trans('admin/user.success_message'));
        } catch (\Throwable $e) {
            return redirect()->route('admin.users.index')->with('warning', trans('admin/user.error_message'));

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
        return view('errors.404');

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
        // return $request;
        $password = '';
        if ($request->password == NULL) {
            $user = User::find($id);
            $password = $user->password;
        } else {
            $password = Hash::make($request->password);
        }

        if ($request->name == NULL) {
            $user = User::find($id);
            $name = $user->name;
        } else {
            $name = $request->name;
        }


        $status = '';
        if ($request->has('status') == 1) {
            $status = 1;
        } else {
            $status = 0;
        }

        try {
            $role_user=User::find($id)->roles->pluck('name');
            User::find($id)->removeRole($role_user->first());
        } catch (\Throwable $th) {
            $role_user ='مستخدم';
        }



        $role = Role::findById($request->roles_name);

        // $role = Role::findById($request->roles_name);
        // $role_name= $role->name;

        $user = User::find($id)->update([
            'name' => $name,
            'password' => $password,
            'roles_name' => $role->name,
            'status' => $status

        ]);

        $user = User::find($id);
        $user->update([]);
        $user->assignRole($role->name);


        return redirect()->route('admin.users.index')->with('success', trans('admin/user.update_message'));
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
        return redirect()->route('admin.users.index')->with('succes', trans('admin/user.delete_message'));
    }
}
