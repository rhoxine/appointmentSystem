@extends('templates.appointment_template')
@section('content')
    @include('templates.navbar_template')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-md-11 offset-1 mt-5 mb-5">

                    <div id="calendar">

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bookAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="bookAppointmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookAppointmentModalLabel">Set an Appointment</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close">
                    </button>

                </div>


                <form action="{{ route('appointment.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h4>Appointment Schedule</h4>
                        <h6 id="selectedDate"></h6>

                        <div class="container">
                            <div class="row">
                                <div class="col-md">
                                    <h6>Owner Information</h6>
                                </div>
                                <div class="col-md">
                                    <h6>Pet Information</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md me-2 form-outline mb-4">
                                    <input type="text" name="owner_name" id="form3Example4" class="form-control" />
                                    <label class="form-label" for="form3Example4">Name</label>
                                </div>

                                <input type="hidden" name="appointment_date" id="appointmentDate">


                                <div class="col-md">
                                    <select class="form-select" name="pet_type" aria-label="Small select example">
                                        <option selected>Select a Pet Type</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md me-2 form-outline mb-4">
                                    <input type="text" name="contact" id="form3Example4" class="form-control" />
                                    <label class="form-label" for="form3Example4">Contact Number </label>
                                </div>
                                <div class="col-md form-outline mb-4">
                                    <input type="text" name="breed" id="form3Example4" class="form-control" />
                                    <label class="form-label" for="form3Example4">Breed</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md me-2 form-outline mb-4">
                                    <input type="text" name="email_address" id="form3Example4" class="form-control" />
                                    <label class="form-label" for="form3Example4">Email address</label>
                                </div>

                                <div class="col-md form-outline mb-4">
                                    <input type="text" name="age" id="form3Example4" class="form-control" />
                                    <label class="form-label" for="form3Example4">Pet Age</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md form-outline mb-4">
                                    <input type="text" name="address" id="form3Example4" class="form-control" />
                                    <label class="form-label" for="form3Example4">Address</label>
                                </div>

                                <div class="col-md">
                                    <select class="form-select" name="service" aria-label="Small select example">
                                        <option selected>Select a service</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->service }}">{{ $service->service }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Book Appointment</button>
                    </div>
            </div>
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    right: 'prev,next today',
                    center: 'title',
                    left: ''
                },
                defaultView: 'month',
                dayRender: function(date, cell) {
                    var currentDate = moment();

                    if (date.isBefore(currentDate, 'day') || date.isSame(currentDate, 'day')) {
                        var button = $('<button/>', {
                            class: 'date-button disabled',
                            disabled: true,
                        }).text('BOOK');

                        cell.append(button);
                    } else {
                        var button = $('<button/>', {
                            class: 'date-button',
                            'data-date': date.format('YYYY-MM-DD'),
                        }).text('BOOK');

                        button.css({
                            'margin-top': '100px',
                            'margin-left': '80px'
                        });

                        cell.append(button);
                        
                        button.click(function() {
                            // Check if the user is authenticated
                            @auth
                                var clickedDate = $(this).data('date');
                                $('#selectedDate').text(clickedDate);
                                $('#appointmentDate').val(clickedDate);
                                $('#bookAppointmentModal').modal('show');
                            @else
                                // Redirect to the register page if the user is not authenticated
                                window.location.href = '/register';
                            @endauth
                        });
                    }
                },
            });
        });
    </script>
@include('templates.sweetalert')
@endsection
