<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Footer;
use App\Models\ManageServices;

class ContentManagementController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'contact_number',
            'email_address',
            'location',
            'work_hours',
            'copyright',
        ]);

        $service_list = new Footer();
        $service_list->contact_number = $request->input('contact_number');
        $service_list->email_address = $request->input('email_address');
        $service_list->location = $request->input('location');
        $service_list->work_hours = $request->input('work_hours');
        $service_list->copyright = $request->input('copyright');

        $service_list->save();
        return redirect()->back()->with('success', 'Service added successfully');
    }


    //dropdown user
    public function getHomepage()
    {
        $services_list = ManageServices::all();
        $footers = Footer::all();

        return view('client_side.homepage', compact('services_list', 'footers'));
    }

    public function get_footer()
    {
        $footers = Footer::all();
        return view('admin_side.content_management.footer_list', compact('footers'));
    }

    public function edit($footer_id)
    {
        $footer = Footer::find($footer_id);
        return view('footer.edit', compact('footer'));
    }

    public function update(Request $request, $footer_id)
    {
        $footer = Footer::find($footer_id);

        if ($footer) {
            $footer->contact_number = $request->input('contact_number');
            $footer->email_address = $request->input('email_address');
            $footer->location = $request->input('location');
            $footer->work_hours = $request->input('work_hours');
            $footer->copyright = $request->input('copyright');

            $footer->save();

            return redirect('/footer')->with('success', 'Footer updated successfully');
        } else {
            return redirect('/footer')->with('error', 'Footer not found');
        }
    }


    public function store_service_list(Request $request)
    {
        // Validate the input data
        $request->validate([
            'service_name' => 'required',
            'fee' => 'required|numeric',
            'service_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('service_img')) {
            $imagePath = $request->file('service_img')->store('images_uploads', 'public');
        } else {
            $imagePath = null;
        }

        ManageServices::create([
            'service_name' => $request->input('service_name'),
            'fee' => $request->input('fee'),
            'service_img' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Service created successfully');
    }

    //admin_side display into table
    public function get_service_list()
    {
        $services_list = ManageServices::all();
        return view('admin_side.content_management.services_list', compact('services_list'));
    }


    public function get_service_details()
    {
        $services_list = ManageServices::all();
        return view('client_side.home', compact('services_list'));
    }
    public function destroy($services_id)
    {
        $services = ManageServices::find($services_id);

        // Check if the category exists
        if ($services) {
            // Delete the category
            $services->delete();
            return redirect()->back()->with('success', 'Service deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Service not found');
        }
    }


    public function edit_service_list($services_id)
    {

        $services = ManageServices::find($services_id);
        return view('services_list.edit', compact('services'));
    }

    public function update_service_list(Request $request, $services_id)
    {
        $services_list = ManageServices::find($services_id);

        if ($services_list) {
            $services_list->service_name = $request->input('service_name');
            $services_list->fee = $request->input('fee');
            // $services_list->service_img = $request->input('service_img');
            if ($request->hasFile('service_img')) {
                // Delete the old image if it exists
                Storage::delete($services_list->service_img);

                // Upload the new image
                $imagePath = $request->file('service_img')->store('images_uploads', 'public');
                $services_list->service_img = $imagePath;
            }


            $services_list->save();

            return redirect()->back()->with('success', 'Service information updated successfully');
        } else {
            return redirect()->back()->with('error', 'Service information not found');
        }

    }


}
