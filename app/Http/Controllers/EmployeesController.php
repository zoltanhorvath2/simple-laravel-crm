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
        $validated = $request->validate([
            'last_name' => 'required|min:1|max:150',
            'first_name' => 'required|min:1|max:150',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|min:1|max:150'
        ]);

        //We have to parse the company_id foreign key from company_name input
        $companyId = (integer)explode(' - ', $request->company_name)[0];

        $employee = new Employee();

        $employee->last_name    = $request->last_name;
        $employee->first_name   = $request->first_name;
        $employee->company_id   = $companyId;
        $employee->email        = $request->email;
        $employee->phone_number = $request->phone_number;

        $request = $employee->save();

        if(!$request){
            return back()->with(['error_message' => 'Hiba! Az alkalmazott felvitele sikertelen!']);
        }else{
            return back()->with(['success_message' => 'Az alkalmazott felvitele sikeres volt!']);
        }

    }

    public function delete(Request $request){
        $deletion = Employee::find($request->id)->delete();

        if(!$deletion){
            return response()->json(['code' => 0, 'msg' => 'Az alkalmazott törlése sikertelen!']);
        }else{
            return response()->json(['code' => 1, 'msg' => 'Az alkalmazott törölve!']);
        }
    }
}
