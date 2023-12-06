<?php

namespace App\Http\Controllers;

use App\Models\SpecialCases;
use Illuminate\Http\Request;
use App\Models\Services;

class SpecialCasesController extends Controller
{
    public function store(Request $request)
    {
       

        $service = Services::where('service_id', $request->input('service_id'))->first();

        SpecialCases::create([
            'owner_name' => $request->input('owner_name'),
            'service_id' => $service->service_id,
            'pet_name' => $request->input('pet_name'),
            'age'=> $request->input('age'),
            'pet_type'=> $request->input('pet_type'),
        ]);

        return redirect()->back()->with('success', 'Case added successfully');
    }
    public function get_services()
    {
        $services = Services::all();
        $cases = SpecialCases::all();

        return view('admin_side.cases', compact('services', 'cases' ));
    }

    public function destroy($special_case_id)
    {
        $special_case = SpecialCases::find($special_case_id);

        // Check if the category exists
        if ($special_case) {
            // Delete the category
            $special_case->delete();
            return redirect()->back()->with('success', 'Case deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Case not found');
        }
    }


    public function edit($special_case_id)
    {
        // $service = DB::select("SELECT * FROM services WHERE service_id = ?", [$service_id]);
        $special_cases = SpecialCases::find($special_case_id);
        return view('special_case.edit', compact('special_cases'));
    }


    public function update(Request $request, $special_case_id)
    {
        $special_cases = SpecialCases::find($special_case_id);

        if ($special_cases) {
            $special_cases->owner_name = $request->input('owner_name');
            $special_cases->pet_name = $request->input('pet_name');
            $special_cases->age = $request->input('age');


            $special_cases->save();

            return redirect('/admin/cases')->with('success', 'Case updated successfully');
        } else {
            return redirect('/admin/cases')->with('error', 'Case not found');
        }
    }
}
