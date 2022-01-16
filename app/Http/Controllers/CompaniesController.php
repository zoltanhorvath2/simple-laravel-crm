<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Yajra\DataTables\DataTables;

class CompaniesController extends Controller
{

    public function list(){
        return view('companies.listCompanies');
    }


    public function getCompanies(DataTables $dataTables){
        $companies = Company::all();

        return $dataTables->of($companies)->toJson();
    }
}
