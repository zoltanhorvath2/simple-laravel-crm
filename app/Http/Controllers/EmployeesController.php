<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Employee;

class EmployeesController extends Controller
{
    public function list(){
        return view('employees.listEmployees');
    }

    public function getEmployees(DataTables $dataTables){
        $employees = Employee::all();

        return $dataTables->of($employees)->toJson();
    }
}
