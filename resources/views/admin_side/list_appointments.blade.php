@include('templates.data_table_template')
@extends('templates.admin_sidenav')
@section('content')
    <div class="container  mt-2">
        <div class="card card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">List of Appointments</h5>
                    </div>

                </div>
                <hr>
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Owner Name</th>
                            <th>Appointment Date</th>
                            <th>Email Address</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Pet Type</th>
                            <th>Breed</th>
                            <th>Age</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $appointment->owner_name }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->email_address }}</td>
                                <td>{{ $appointment->address }}</td>
                                <td>{{ $appointment->contact }}</td>
                                <td>{{ $appointment->pet_type }}</td>
                                <td>{{ $appointment->breed }}</td>
                                <td>{{ $appointment->age }}</td>
                                <td>
                                    @if ($appointment->status == 0)
                                        <span class="badge rounded-pill badge-secondary">Pending</span>
                                    @elseif($appointment->status == 1)
                                        <span class="badge rounded-pill badge-success">Confirmed</span>
                                    @elseif($appointment->status == 2)
                                        <span class="badge rounded-pill badge-danger">Cancelled</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary "
                                        href="{{ route('admin_side/edit_client_status', ['client_id' => $appointment->client_id]) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-danger " data-bs-toggle="modal" data-mdb-target="" href="">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $count++; ?>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
