<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
          'reg_id' => 'required',
     
        ]);
          // create new data
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->reg_id = $request->reg_id;
        $user->password = $request->password;
        $user->status = $request->status;
        $user->type = 'Pharmacist';
        $user->save();
        return redirect()->route('users.index')->with('message-success','User created!');
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
        $user = User::findOrFail($id);
        // return to the edit views
        return view('users.edit',compact('user'));
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
          'reg_id' => 'required',
      ]);

        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->reg_id = $request->reg_id;
        $user->password = $request->password;
        $user->status = ($request->status) ? 1 : 0;
        $user->type = 'Pharmacist';

        $user->save();

        return redirect()->route('users.index')->with('message-success', 'User updated!');
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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('message-success', 'User deleted!');
    }
}
