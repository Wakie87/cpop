<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SeederTest extends TestCase

{
    use DatabaseMigrations;

	public function testSuppliersTable()
	{
		factory(App\Supplier::class)->create([
		    'name'  => 'Sigma'
	    ]);
	  $this->seeInDatabase('suppliers', ['name' => 'Sigma']);
	}
}	