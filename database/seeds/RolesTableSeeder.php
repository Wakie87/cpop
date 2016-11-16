<?php

use Illuminate\Database\Seeder;

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
        $admin = new Role();
		$admin->name         = 'admin';
		$admin->display_name = 'Administrator'; // optional
		$admin->description  = 'Root'; // optional
		$admin->save();

		 //
        $manager = new Role();
		$manager->name         = 'manager';
		$manager->display_name = 'Manager'; // optional
		$manager->description  = 'User is allowed to manage and edit other users'; // optional
		$manager->save();

		        //
        $pharmacist = new Role();
		$pharmacist->name         = 'pharmacist';
		$pharmacist->display_name = 'Pharmacist'; // optional
		$pharmacist->description  = 'User is allowed to dose patients'; // optional
		$pharmacist->save();
    }
}
