<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DoctorTest extends TestCase

{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(App\User::class)->make();
    }

	/**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateSuccess()
    {
        $input = factory(App\Doctor::class)->make()->toArray();
        $this->actingAs($this->user)
            ->visit('doctors/create')
            ->submitForm('Save', $input)
            ->see('Doctor created!')
            ->seePageIs('doctors');
    }

    public function testEditDataAvailable()
    {
        factory(App\Doctor::class)->create();
        $this->actingAs($this->user)
            ->visit('doctors/1/edit')
            ->see('Doctors - Edit');
    }

    public function testEditDataNotFound()
    {
        $this->actingAs($this->user)
            ->get('doctors/1/edit')
            ->assertResponseStatus(404);
    }

    public function testUpdateSuccess()
    {
        factory(App\Doctor::class)->create(); 
        $input = factory(App\Doctor::class)->make()->toArray();
        $this->actingAs($this->user)
            ->visit('doctors/1/edit')
            ->submitForm('Update', $input)
            ->see('Doctor updated!')
            ->seePageIs('doctors');
    }

    public function testDeleteSuccess()
    {
        factory(App\Doctor::class)->create(['first_name' => 'Doctor Tests']);
        $this->actingAs($this->user)
            ->visit('doctors')
            ->submitForm('Delete')
            ->see('Doctor deleted!')
            ->seePageIs('doctors');
    }

}