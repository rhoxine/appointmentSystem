<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Category;
use App\Models\Appointment;
use App\Models\Users;
use Barryvdh\DomPDF\Facade as PDF;

class AppointmentController extends Controller
{
    public function store_appointment(Request $request)
    {
        $request->validate([
            'owner_name' => 'required|string',
            'pet_type' => 'required',
            'contact' => 'required|string',
            'breed' => 'required|string',
            'email_address' => 'required|email',
            'age' => 'required|numeric',
            'address' => 'required|string',
            'service' => 'required',
            'status' => 'nullable',

        ]);

        $appointment = new Appointment();
        $appointment->user_id = auth()->id();
        $appointment->owner_name = $request->input('owner_name');
        $appointment->appointment_date = $request->input('appointment_date');
        $appointment->pet_type = $request->input('pet_type');
        $appointment->contact = $request->input('contact');
        $appointment->breed = $request->input('breed');
        $appointment->email_address = $request->input('email_address');
        $appointment->age = $request->input('age');
        $appointment->address = $request->input('address');
        $appointment->service = $request->input('service');
        $appointment->status = $request->input('status', 0);


        $appointment->save();
        return redirect()->back()->with('success', 'Appointment booked successfully');
    }

    public function get_appointments()
    {
        $appointments = Appointment::all();

        return view('admin_side.list_appointments', compact('appointments'));
    }

    public function showAppointmentForm()
    {
        $categories = Category::all();
        $services = Services::all();
        return view('client_side.appointment', compact('services', 'categories'));
    }

    public function showDetails($client_id)
    {
        $appointment = Appointment::where('client_id', $client_id)->first();

        return view('admin_side.edit_client_status', compact('appointment'));
    }

    //admin
    public function updateStatus(Request $request, $client_id)
    {
        $request->validate([
            'status' => 'required|in:0,1,2',
            'comment' => 'nullable|string',
        ]);

        $appointment = Appointment::where('client_id', $client_id)->first();
        $appointment->status = $request->input('status');
        $appointment->comment = $request->input('comment');
        $appointment->save();

        return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    //client_side my appointments
    public function getClientAppointments()
    {
        $userAppointments = Appointment::where('user_id', auth()->id())->get();

        return view('client_side.my_appointments', ['userAppointments' => $userAppointments]);
    }


    public function destroy($client_id)
    {
        $appointment = Appointment::find($client_id);

        // Check if the category exists
        if ($appointment) {
            // Delete the category
            $appointment->delete();
            return redirect()->back()->with('success', 'Appoitment deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Appoitment not found');
        }
    }



    public function get_cases()
    {
        return view('admin_side.cases');
    }

}
