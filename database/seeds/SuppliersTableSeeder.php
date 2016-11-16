<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$suppliers = [
	    	['name'  => 'Sigma'],
		    ['name'  => 'API'],
		    ['name'  => 'Symbion']
    	];
    	foreach ($suppliers as $supplier){
    		factory(App\Supplier::class)->create($supplier);
    	}
    }
}
