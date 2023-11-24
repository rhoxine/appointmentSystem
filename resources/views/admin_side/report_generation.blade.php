@extends('templates.data_table_template')
@extends('templates.admin_layouts')
@section('content')
    <div class="container mt-2">
        <div class="card card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Report Generation</h5>
                    </div>
                </div>

                <form method="POST" action="{{ route('generate_report') }}" class="mb-3">
                    @csrf
                    <div class="d-flex flex-column flex-md-row mb-3">
                        <div class="mb-2 mb-md-0">
                            Select Start Date
                            <input type="date" name="start_date">
                        </div>
                        <div class="d-flex flex-column flex-md-row mb-3">
                            Select End Date
                            <input type="date" name="end_date">
                        </div>
                        <div class="ms-md-3 mb-2 mb-md-0">
                            <button type="submit" class="btn btn-primary">
                                Generate Report <i class="fa fa-arrow-down"></i>
                            </button>
                        </div>
                    </div>

                </form>

                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Appointment Date</th>
                                <th>Owner Name</th>
                                <th>Pet Type</th>
                                <th>Breed</th>
                                <th>Age</th>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
