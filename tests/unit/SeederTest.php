<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SeederTest extends TestCase

{
    use DatabaseTransactions;

	public function testSuppliersTable()
	{
		factory(App\Supplier::class)->create([
	        'name' => 'Fitchs Pharmacy',
	    ]);
	  $this->seeInDatabase('suppliers', ['name' => 'Fitchs Pharmacy']);
	}
}	