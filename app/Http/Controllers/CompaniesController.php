<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\MediaController;

class CompaniesController extends Controller
{

    private $media;

    public function __construct(){
        $this->media = new MediaController();
    }

    public function list(){
        return view('companies.listCompanies');
    }


    public function getCompanies(DataTables $dataTables){
        $companies = Company::all();

        return $dataTables->of($companies)->toJson();
    }

    public function newCompany(){
        return view('companies.newCompany');
    }

    public function createCompany(Request $request){

        $validated = $request->validate([
            'company_name' => 'required|min:2|max:200',
            'email' => 'nullable|email',
            'website_url' => 'nullable|min:2|max:200',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:5048'
        ]);

        if($request->hasFile('logo')){
            $this->media->logoProcessor($request);
        }

        $logoUrl = $this->media->newLogoName ?
                asset('assets/logos') . '/' . $this->media->newLogoName : '';

        $company = new Company();

        $company->company_name = $request->company_name;
        $company->email = $request->email;
        $company->website_url = $request->website_url;
        $company->logo_url = $logoUrl;

        $request = $company->save();

        $this->media->newLogoName = '';

        if(!$request){
            return back()->with(['error_message' => 'Hiba! A cég felvitele sikertelen!']);
        }else{
            return back()->with(['success_message' => 'A cég felvitele sikeres volt!']);
        }
    }

    public function getCompanyNames(Request $request){

        $results = Company::select('id','company_name')
            ->where('company_name', 'LIKE', "%$request->term%")->get();

        foreach ($results as $result){
            $result->value = $result->id . ' - ' . $result->company_name;
            $result->label = $result->id . ' - ' . $result->company_name;
            unset($result->name);
            unset($result->id);
        }

        if(!$results){
            return response()->json(['response' =>'Nincs találat.']);
        }else{
            return response()->json($results);
        }
    }

}
