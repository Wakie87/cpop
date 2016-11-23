<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('users')->delete();
        DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'reg_id' => '1234567',
                'remember_token' => null,
                'created_at' => '2016-06-04 13:42:19',
                'updated_at' => '2016-06-04 13:42:19',
            ),
        ));

    	factory(App\User::class, 10)->create();
    }
}