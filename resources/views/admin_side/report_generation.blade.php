{{-- @extends('templates.data_table_template') --}}
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
                <div class="table-responsive ">
                    <table class="table align-middle mb-0 bg-white" id="reportTable">
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

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include DataTables and Buttons scripts -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
<!-- Include pdfmake library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>

<!-- Include Bootstrap scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style>
    #reportTable_wrapper.text-center .dataTables_empty {
    text-align: center !important;
}
</style>
<!-- Your custom script -->
<script>
    $(document).ready(function() {
    $('#reportTable').DataTable({
        searching: false, 
        lengthChange: false, 
        info: false, 
        paging: false, 
        dom: '<"d-flex justify-content-end"B>', 
        buttons: [
            {
                extend: 'pdfHtml5',
                title: 'Inventory Report',
                customize: function(doc) {
                },
                className: 'btn btn-primary', 
                text: '<i class="fa fa-file-pdf"></i> Generate PDF' 
            }
        ]
    });
    var dataTableContainer = $('#reportTable_wrapper');
    dataTableContainer.addClass('text-center');
});
</script>

@endsection
