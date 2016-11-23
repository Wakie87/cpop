<?php 

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Permission;
use App\Http\Requests;
use App\Datatables\PermissionsDataTable;


class PermissionController extends Controller
{

    public function index(PermissionsDataTable $dataTable)
    {

        return $dataTable->render('permissions.index');
    }


}