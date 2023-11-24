@extends('templates.home_template')
@section('content')
    @include('templates.navbar_template')

    <body>
        
            <div class="container mt-5 p-5">

                <h2>My Appointments</h2>

                @if ($userAppointments->isEmpty())
                <div class="text-center">
                    <img src="{{asset('images/no_data.png')}}" alt="">
                    <p class="mt-3">No Appointments Yet.</p>
                </div>

                @else
               
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Appointment Date</th>
                            <th>Breed</th>
                            <th>Age</th>
                            <th>Status</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userAppointments as $appointment)
                        <tr>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td> {{ $appointment->breed }}</td>
                            <td>{{ $appointment->age }}</td>
                            <td>@if ($appointment->status == 0)
                                <span class="badge rounded-pill badge-secondary">{{ getStatusName($appointment->status) }}</span>
                            @elseif($appointment->status == 1)
                                <span class="badge rounded-pill badge-success">{{ getStatusName($appointment->status) }}</span>
                            @elseif($appointment->status == 2)
                                <span class="badge rounded-pill badge-danger">{{ getStatusName($appointment->status) }}</span>
                            @endif</td>
                            <td>{{ $appointment->comment}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
               
            </div>
       
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
