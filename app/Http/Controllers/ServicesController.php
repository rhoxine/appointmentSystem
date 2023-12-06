<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Category;

class ServicesController extends Controller
{
    public function show_service()
    {
        return view('admin_side.services');
    }


    public function store(Request $request)
    {
        $request->validate([
            'service' => 'required',
            'category_id' => 'required',
            'service_fee' => 'required',
        ]);

        $category = Category::where('category_id', $request->input('category_id'))->first();

        Services::create([
            'service' => $request->input('service'),
            'category_id' => $category->category_id,
            'service_fee' => $request->input('service_fee'),
        ]);

        return redirect()->back()->with('success', 'Service added successfully');
    }

    public function get_services()
    {
        $services = Services::all();
        $categories = Category::all();

        return view('admin_side.services', compact('services', 'categories'));
    }

    public function destroy($service_id)
    {
        // Find the category by its ID
        $service = Services::find($service_id);

        // Check if the category exists
        if ($service) {
            // Delete the category
            $service->delete();
            return redirect()->back()->with('success', 'Service deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Service not found');
        }
    }

    public function edit($service_id)
    {
        $service = Services::find($service_id);
        return view('services.edit', compact('service'));
    }


    public function update(Request $request, $service_id)
    {
        $service = Services::find($service_id);

        if ($service) {
            $service->service = $request->input('service');
            $service->service_fee = $request->input('service_fee');

            $service->save();

            return redirect('/admin/services')->with('success', 'Service updated successfully');
        } else {
            return redirect('/admin/services')->with('error', 'Service not found');
        }
    }


}
