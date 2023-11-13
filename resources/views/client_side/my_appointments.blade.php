@extends('templates.home_template')
@section('content')
    @include('templates.navbar_template')

    <body>
        <center>
            <div class="container mt-5">

                <h2>My Appointments</h2>

                @foreach ($userAppointments as $appointment)
                    <div class="appointment-border w-25">
                        <div class="appointment-content">
                            <h5 class="appointment-title">Appointment on {{ $appointment->appointment_date }}</h5>
                            <p class="appointment-text">
                                <strong>Pet:</strong> {{ $appointment->breed }}<br>
                                <strong>Age:</strong> {{ $appointment->age }}<br>
                                <strong>Status:</strong> {{ getStatusName($appointment->status) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </center>
        @php
            function getStatusName($status)
            {
                $statusNames = [
                    0 => 'Pending',
                    1 => 'Confirmed',
                    2 => 'Cancelled',
                ];

                return $statusNames[$status] ?? 'Unknown';
            }
        @endphp

    </body>
