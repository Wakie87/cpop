<?php 

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Datatables\RolesDataTable;

class RoleController extends Controller
{

    public function index(RolesDataTable $dataTable)

    {
        return $dataTable->render('roles.index');
    }

    
}