<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\DataTables\SupplierDataTable;
use App\Supplier;
//use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SupplierDataTable $dataTable)
    {
        //$suppliers = Supplier::all();
        //return view('suppliers.index',['suppliers' => $suppliers]);
        return $dataTable->render('suppliers.index');
    }


}
