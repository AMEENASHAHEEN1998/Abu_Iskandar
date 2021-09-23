<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        // $roles = Role::find(3);
        // return $roles->permissions;

        $roles = Role::all();
        $permissions = Permission::all();
        $roles = Role::with('permissions')->get();
        // return $roles;

        return view('admin.role.index', compact('roles', 'permissions'));
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
    public function store(Request $request)
    {
        try {
            $role = Role::create([
                'name' => $request->name,
                'guard_name' => 'web',
    
            ]);
            // return $role;
            $permissions = $request->name_permission;
            if ($request->has('name_permission')) {
    
                foreach ($permissions as $permission) {
                    $p = Permission::where('id', '=', $permission)->firstOrFail();
    
                    // $role = Role::where('name', '=', $request->name)->first();
                    $role->givePermissionTo($p);
                }
            }
            return redirect()->route('admin.role.index')->with('success', trans('admin/role.success_message'));
        } catch (\Throwable $th) {
            return redirect()->route('admin.role.index')->with('warning',trans('admin/role.error_message'));
        }

        
    }

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
        $role = Role::find($id)->with('permissions')->get();
        return $role;
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
        $roles = Role::find($id);

        foreach($roles->permissions as $permission){
            $roles->revokePermissionTo($permission->name);
        }

        $role = Role::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        $role = Role::find($id)->get();
        $permissions = $request->name_permission;

        if ($request->has('name_permission')) {
            foreach ($permissions as $permission) {
                $p = Permission::where('id', '=', $permission)->firstOrFail();
                $role = Role::where('name', '=', $request->name)->first();

                $role->givePermissionTo($p);

            }
        }
        return redirect()->route('admin.role.index')->with('success', trans('admin/role.update_message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        return redirect()->route('admin.role.index')->with('success', trans('admin/role.delete_message'));
    }
}
