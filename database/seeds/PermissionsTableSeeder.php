<?php

use Illuminate\Database\Seeder;
use Zizaco\Entrust;
use App\Permission;
use App\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * User Permissions
         */
        
        $createUser = new Permission;
        $createUser->display_name = 'Create user';
        $createUser->name = 'user-create';
        $createUser->description = 'Permission to create user';
        $createUser->save();

        $updateUser = new Permission;
        $updateUser->display_name = 'Update user';
        $updateUser->name = 'user-update';
        $updateUser->description = 'Permission to update user';
        $updateUser->save();
        
        $deleteUser = new Permission;
        $deleteUser->display_name = 'Delete user';
        $deleteUser->name = 'user-delete';
        $deleteUser->description = 'Permission to update delete';
        $deleteUser->save();

        $role = Role::where('name','=', 'administrator')->firstOrFail();
        $permission = Permission::all()->toArray();
        $role->attachPermissions($permission);

    }
}
