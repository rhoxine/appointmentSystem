<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Category;
use App\Models\Appointment;
use Barryvdh\DomPDF\Facade as PDF;

class AppointmentController extends Controller
{
    // public function showAppointment(){
    //     return view('client_side.appointment');
    // }
    public function store_appointment(Request $request)
{
    // Validate the input data (add validation rules as needed)
    $request->validate([
        'owner_name' => 'required|string',
        'pet_type' => 'required',
        // 'pet_type' => 'required|string',
        'contact' => 'required|string',
        'breed' => 'required|string',
        'email_address' => 'required|email',
        'age' => 'required|numeric',
        'address' => 'required|string',
        'service' => 'required',
        'status' => 'nullable',
        
        // 'appointment_date' => 'required|date',
        // 'appointment_time' => 'required',
    ]);

    // Create a new appointment record in the database
    $appointment = new Appointment();
    $appointment->owner_name = $request->input('owner_name');
    $appointment->appointment_date = $request->input('appointment_date'); // Save the selected date
    $appointment ->pet_type = $request->input('pet_type');
    // $appointment->pet_type = $request->input('pet_type');
    $appointment->contact = $request->input('contact');
    $appointment->breed = $request->input('breed');
    $appointment->email_address = $request->input('email_address');
    $appointment->age = $request->input('age');
    $appointment->address = $request->input('address');
    $appointment->service = $request->input('service');
    $appointment->status = $request->input('status', 0);
    // $appointment->appointment_date = $request->input('appointment_date');
    // $appointment->appointment_time = $request->input('appointment_time');

    $appointment->save();

    // You can add additional logic here if needed

    // Redirect to a success page or return a response
    return redirect()->back()->with('success', 'Appointment booked successfully');
}



public function get_appointments()
{
    $appointments = DB::select('SELECT * FROM appointments');

    return view('admin_side.list_appointments', compact('appointments'));
}

// public function get_appointments()
// {
//     $appointments = DB::select('SELECT * FROM appointments');

//     return view('admin_side.list_appointments', compact('appointments'));
// }
    //this can be use also in retrieving data from db
    // $users = Users::all();
    // return view('admin_side.users', compact('users'));


    //For client_side once they click the book button on the calendar
    public function showAppointmentForm()
    {
        $categories = Category::all();
        $services = Services::all();
        return view('client_side.appointment', compact('services', 'categories'));
    }



    //showdetails on the edit_client_status blade 
    public function showDetails($client_id)
{
    // Fetch appointment details using the $client_id
    $appointment = Appointment::where('client_id', $client_id)->first(); // Assuming Appointment is your model

    return view('admin_side.edit_client_status', compact('appointment'));
}

public function updateStatus(Request $request, $client_id)
{
    // Validate the request data
    $request->validate([
        'status' => 'required|in:0,1,2', // Assuming the status values are 0, 1, and 2
    ]);

    // Update the status of the appointment
    $appointment = Appointment::where('client_id', $client_id)->first();
    $appointment->status = $request->input('status');
    $appointment->save();

    return redirect()->back()->with('success', 'Status updated successfully');
    
      // Redirect to a named route 'appointment.list' after the status update
      
    //   return redirect()->route('client_side.list_appointments')->with('success', 'Status updated successfully');

}



// public function generateReport(Request $request)
// {
//     $start_date = $request->input('start_date');
//     $end_date = $request->input('end_date');

//     $appointmentQuery = Appointment::query();

//     if($start_date && $end_date){

//         $appointmentQuery->whereBetween('appointment_date', [$start_date, $end_date]);
//     }


//     $filteredAppointments = $appointmentQuery->get();

//     return view('admin_side.report_generation', compact('filteredAppointments'));
// }

public function generateReport(Request $request)
{
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

    $filteredAppointments = [];

    if ($start_date && $end_date) {
        $appointmentQuery = Appointment::query();
        $appointmentQuery->whereBetween('appointment_date', [$start_date, $end_date]);
        $filteredAppointments = $appointmentQuery->get();
    }

    if ($request->has('export_pdf')) {
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin_side.report_generation', compact('filteredAppointments'));

        // Download the PDF
        return $pdf->download('report.pdf');
    }


    return view('admin_side.report_generation', compact('filteredAppointments'));
}
// public function generateReport(Request $request)
//     {
//         $start_date = $request->input('start_date');
//         $end_date = $request->input('end_date');

//         $appointmentQuery = Appointment::query();

//         if ($start_date && $end_date) {
//             $appointmentQuery->whereBetween('appointment_date', [$start_date, $end_date]);
//         }

//         $filteredAppointments = $appointmentQuery->get();

//         // Check if the "Export to PDF" button is clicked
//         if ($request->has('export_pdf')) {
//             $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin_side.pdf_report', compact('filteredAppointments'));

//             // Download the PDF
//             return $pdf->download('report.pdf');
//         }

//         return view('admin_side.report_generation', compact('filteredAppointments'));
//     }



}
