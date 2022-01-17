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

    public function get(DataTables $dataTables){
        $employees = Employee::all();

        foreach($employees as $employee){
            $employee->company_name = $employee->company->company_name;
        }

        return $dataTables->of($employees)->toJson();
    }

    public function new(){
        return view('employees.newEmployee');
    }

    public function create(Request $request){
        $validated = $request->validate([
            'last_name' => 'required|min:1|max:150',
            'first_name' => 'required|min:1|max:150',
            'email' => 'nullable|email',
            'company_name' => 'required',
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

    public function edit($id){
        $employee = Employee::find($id);
        $company = $employee->company_id ? Company::find($employee->company_id) : '';

        $pageData = [
            'id'            => $employee->id,
            'last_name'     => $employee->last_name,
            'first_name'    => $employee->first_name,
            'company_name'  => $company ? $company->id . ' - ' . $company->company_name : '',
            'email'         => $employee->email,
            'phone_number'  => $employee->phone_number
        ];

        return view('employees/editEmployee')->with($pageData);
    }

    public function update(Request $request){
        $validated = $request->validate([
            'last_name' => 'required|min:1|max:150',
            'first_name' => 'required|min:1|max:150',
            'email' => 'nullable|email',
            'company_name' => 'required',
            'phone_number' => 'nullable|min:1|max:150'
        ]);

        //We have to parse the company_id foreign key from company_name input
        $companyId = (integer)explode(' - ', $request->company_name)[0];

        $update = Employee::find($request->id)
            ->update([
                'last_name'       => $request->last_name,
                "first_name"      => $request->first_name,
                "email"           => $request->email,
                "company_id"      => $companyId,
                "phone_number"    => $request->phone_number
            ]);

        if(!$update){
            return back()->with(['error_message' => 'Hiba! Az alkalmazott adatainak frissítése sikertelen!']);
        }else{
            return back()->with(['success_message' => 'Az alkalmazott adatainak frissítése sikeres volt.']);
        }

    }


}
