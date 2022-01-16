<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Employee;
use App\Models\Company;

class EmployeesController extends Controller
{
    public function list(){
        return view('employees.listEmployees');
    }

    public function getEmployees(DataTables $dataTables){
        $employees = Employee::all();

        foreach($employees as $employee){
            $employee->company_name = $employee->company->company_name;
        }

        return $dataTables->of($employees)->toJson();
    }

    public function newEmployee(){
        return view('employees.newEmployee');
    }

    public function createEmployee(Request $request){

    }
}
