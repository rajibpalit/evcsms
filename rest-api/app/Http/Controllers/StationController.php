<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Station;

class StationController extends Controller
{
    public function index()
    {
        $company = Station::all();
        return response()->json(['company' => $company], 200);
    }
    public function show($id)
    {
        $company = Station::find($id);
        if ($company) {
            return response()->json(['company' => $company], 200);
        } else {
            return response()->json(['message' => 'No record found'], 404);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'latitude' => 'required|max:191',
            'longitude' => 'required|max:191',
            'company_id' => 'required|max:191',
            'address' => 'required|max:191'
        ]);

        $company = new  Station();

        $company->name = $request->name;
        $company->latitude = $request->latitude;
        $company->longitude = $request->longitude;
        $company->company_id = $request->company_id;
        $company->address = $request->address;
        $company->save();
        return response()->json(['message' => 'Station Added Successfully'], 200);
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|max:191',
            'latitude' => 'required|max:191',
            'longitude' => 'required|max:191',
            'company_id' => 'required|max:191',
            'address' => 'required|max:191'
        ]);

        $company = Station::find($id);
        if ($company) {
            $company->name = $request->name;
            $company->latitude = $request->latitude;
            $company->longitude = $request->longitude;
            $company->company_id = $request->company_id;
            $company->address = $request->address;
            $company->update();
            return response()->json(['message' => 'Station Updated Successfully'], 200);
        } else {
            return response()->json(['message' => 'No Record Found'], 404);
        }
    }

    public function destroy($id)
    {
        $company = Station::find($id);
        if ($company) {
            $company->delete();
            return response()->json(['message' => 'Station Deleted Successfully'], 200);
        } else {
            return response()->json(['message' => 'No Record Found'], 404);
        }
    }

    public function allStation(Request $request)
    {
        $latitude = $request->latitude;
        $longitude = $request->longtitude;
        $radius = $request->radius;
        $company_id = $request->company_id;
        $parent_company_id = Company::where('parent_company_id', $company_id)->pluck('id')->toArray();
        array_push($parent_company_id, $company_id);
        $station = Station::selectRaw("id, name, latitude, longitude, address,
                         ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?)) + sin( radians(?) ) * sin( radians( latitude ) ) )
                         ) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", $radius)
            ->orderBy("distance", 'asc')
            ->whereIn('company_id', $parent_company_id)
            ->get()
            ->groupBy('address');
        if ($station) {
            return response()->json(['station' => $station], 200);
        } else {
            return response()->json(['message' => 'No record found'], 404);
        }
    }

}
