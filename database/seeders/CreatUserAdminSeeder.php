<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreatUserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Hala Shaheen',

            'password' => bcrypt('123123123'),
            'roles_name' => 'مدير',
            'status' => 'مفعل',
        ]);

        $role = Role::create(['name' => 'مدير']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

       // $user->assignRole([$role->id]);
    }
}