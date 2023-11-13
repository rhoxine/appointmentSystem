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

                    if (date.isBefore(currentDate, 'day')) {
                        var button = $('<button/>', {
                            class: 'date-button disabled',
                            disabled: true,
                        }).text('BOOK');

                        cell.append(button);

                    } else {
                        var button = $('<button/>', {
                            class: 'date-button',
                            'data-date': date.format(
                                'YYYY-MM-DD'),
                        }).text('BOOK');

                        button.css({
                            'margin-top': '100px',
                            'margin-left': '80px'
                        });
                        button.click(function() {
                            window.location.href = '/register';
                        });

                        cell.append(button);
                    }
                },

            });
        });
    </script>
@endsection
