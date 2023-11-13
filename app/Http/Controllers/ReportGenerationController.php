<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
class ReportGenerationController extends Controller
{
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
}
