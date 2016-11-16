<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $doctors = Doctor::All();
        return view('doctors.index',['doctors' => $doctors]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'first_name' => 'required',
          'last_name' => 'required',
          'provider_id' => 'required',
     
        ]);
          // create new data
        $doctor = new Doctor;
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->clinic_name = $request->clinic_name;
        $doctor->address = $request->address;
        $doctor->suburb = $request->suburb;
        $doctor->postcode = $request->postcode;
        $doctor->state = $request->state;
        $doctor->telephone = $request->telephone;
        $doctor->fax = $request->fax;
        $doctor->mobile = $request->mobile;
        $doctor->email = $request->email;
        $doctor->provider_id = $request->provider_id;
        $doctor->save();
        return redirect()->route('doctors.index')->with('message-success','Doctor created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $doctor = Doctor::findOrFail($id);
        // return to the edit views
        return view('doctors.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                // validation
        $this->validate($request,[
          'first_name' => 'required',
          'last_name' => 'required',
          'provider_id' => 'required',
      ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->clinic_name = $request->clinic_name;
        $doctor->address = $request->address;
        $doctor->suburb = $request->suburb;
        $doctor->postcode = $request->postcode;
        $doctor->state = $request->state;
        $doctor->telephone = $request->telephone;
        $doctor->fax = $request->fax;
        $doctor->mobile = $request->mobile;
        $doctor->email = $request->email;
        $doctor->provider_id = $request->provider_id;
        $doctor->save();

        return redirect()->route('doctors.index')->with('message-success', 'Doctor updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete data
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctors.index')->with('message-success', 'Doctor deleted!');
    }
}
