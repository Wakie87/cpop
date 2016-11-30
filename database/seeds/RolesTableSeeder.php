<?php

use Illuminate\Database\Seeder;
use Zizaco\Entrust;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRole = new Role();
		$adminRole->name         = 'administrator';
		$adminRole->display_name = 'Administrator'; // optional
		$adminRole->description  = 'Super Administrator'; // optional
		$adminRole->save();

		 //
        $managerRole = new Role();
		$managerRole->name         = 'manager';
		$managerRole->display_name = 'Manager'; // optional
		$managerRole->description  = 'User is allowed to manage and edit other users'; // optional
		$managerRole->save();

		        //
        $pharmacistRole = new Role();
		$pharmacistRole->name         = 'pharmacist';
		$pharmacistRole->display_name = 'Pharmacist'; // optional
		$pharmacistRole->description  = 'User is allowed to dose patients'; // optional
		$pharmacistRole->save();

		$user = User::where('first_name', '=', 'Admin')->firstOrFail();
		$user->attachRole($adminRole);
    }
}
