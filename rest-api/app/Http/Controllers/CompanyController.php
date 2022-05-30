<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();
        return response()->json(['company' => $company], 200);
    }
    public function show($id)
    {
        $company = Company::find($id);
        if ($company) {
            return response()->json(['company' => $company], 200);
        } else {
            return response()->json(['message' => 'No record found'], 404);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191'
        ]);

        $company = new  Company();
        $company->parent_company_id = $request->parent_company_id;
        $company->name = $request->name;
        $company->save();
        return response()->json(['message' => 'Company Added Successfully'], 200);
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'parent_company_id' => 'required|max:191',
            'name' => 'required|max:191'
        ]);

        $company = Company::find($id);
        if ($company) {
            $company->parent_company_id = $request->parent_company_id;
            $company->name = $request->name;
            $company->update();
            return response()->json(['message' => 'Company Updated Successfully'], 200);
        } else {
            return response()->json(['message' => 'No Record Found'], 404);
        }
    }
    public function destroy($id){
        $company = Company::find($id);
        if ($company) {
            $company->delete();
            return response()->json(['message' => 'Company Deleted Successfully'], 200);
        }else{
            return response()->json(['message' => 'No Record Found'], 404);
        }
    }
}
