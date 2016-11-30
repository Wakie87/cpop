<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\User;
use App\Role;
use App\Http\Requests;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * @param \Illuminate\Http\Request $request
     * @param \Yajra\Acl\Models\Role $role
     */
    public function __construct(Request $request, Role $role)

    {
        $this->request = $request;
        $this->role    = $role;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
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
     * Get allowed roles for the current user.
     *
     * @return mixed
     */
    protected function getAllowedRoles()
    {
        if ($this->request->user('Admin')->isRole('administrator')) {
            $roles = $this->role->get();
        } else {
            $roles = $this->role->where('name', '!=', 'administrator')->get();
        }
        return $roles;
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
     * Show and edit selected user.
     *
     * @param \App\User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        $roles = $this->getAllowedRoles();
        return view('users.edit', compact('user', 'roles', 'selectedRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {

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
