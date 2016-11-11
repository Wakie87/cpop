<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SupplierTest extends TestCase

{
	/**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateSuccess()
    {
        $input = factory(App\Supplier::class)->make()->toArray();
        $this->actingAs($this->user)
            ->visit('suppliers/create')
            ->submitForm('Save', $input)
            ->see('Supplier created!')
            ->seePageIs('suppliers');
    }


    

	
    public function testWeSeeAListOfSuppliers()

    {
        factory(App\Supplier::class)->create([
            'name' => 'Fitchs Pharmacy',
        ]);
        $this->visit('/suppliers')
            ->see('Fitchs Pharmacy');
    }
}