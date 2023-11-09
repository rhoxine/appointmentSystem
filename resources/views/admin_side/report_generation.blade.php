@extends('templates.data_table_template')
@extends('templates.admin_sidenav')
@section('content')
    <div class="container mt-2">
        <div class="card card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Report Generation</h5>
                    </div>
                </div>

                <form method="POST" action="{{ route('generate_report') }}">
                    @csrf
                    <div class="d-flex flex-row mb-3">
                        <div class="">
                            Select Start Date
                            <input type="date" name="start_date">
                        </div>
                        <div class="ms-3">
                            Select End Date
                            <input type="date" name="end_date">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-sm ms-3">
                                Generate Report <i class="fa fa-arrow-down"></i>
                            </button>
                        </div>
                        <button type="submit" name="export_pdf" value="1" class="btn btn-secondary btn-sm ms-3">
                            Export to PDF
                        </button>
                    </div>
                    
                </form>

                <hr>
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Appointment Date</th>
                            <th>Owner Name</th>
                            <th>Pet Type</th>
                            <th>Breed</th>
                            <th>Age</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filteredAppointments as $appointment)
                            <tr>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->owner_name }}</td>
                                <td>{{ $appointment->pet_type }}</td>
                                <td>{{ $appointment->breed }}</td>
                                <td>{{ $appointment->age }}</td>
                                <td>
                                    <!-- Actions -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
@endsection
