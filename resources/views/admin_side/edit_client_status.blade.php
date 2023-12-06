@extends('templates.admin_layouts')
@section('content')
    <div class="container mt-2">
        <div class="card card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Appointment Requests Details</h5>
                    </div>
                </div>
                <hr>
                
                <div class="row">
                    <div class="col-md-6">
                        <h5>Owner Information</h5>
                        <hr>
                        
                        <table class="table table-bordered table-sm">
                            <tr>
                                <td class="title">Owner Name</td>
                                <td>{{ $appointment->owner_name }}</td>
                            </tr>
                            <tr>
                                <td class="title">Contact#</td>
                                <td>{{ $appointment->contact }}</td>
                            </tr>
                            <tr>
                                <td class="title">Email</td>
                                <td>{{ $appointment->email_address }}</td>
                            </tr>
                            <tr>
                                <td class="title">Address</td>
                                <td>{{ $appointment->address }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5>Pet Information</h5>
                        <hr>
                        <table class="table table-bordered table-sm">
                            <tr>
                                <td class="title">Pet Type</td>
                                <td>{{ $appointment->pet_type }}</td>
                            </tr>
                            <tr>
                                <td class="title">Breed</td>
                                <td>{{ $appointment->breed }}</td>
                            </tr>
                            <tr>
                                <td class="title">Age</td>
                                <td>{{ $appointment->age }}</td>
                            </tr>
                            <tr>
                                <td class="title">Service Needed</td>
                                <td>{{ $appointment->service }}</td>
                            </tr>
                        </table>

                    </div>

                </div>

                <h6>Status</h6>
                <span class="badge rounded-pill 
                    @if($appointment->status == 0) badge-secondary
                    @elseif($appointment->status == 1) badge-success
                    @elseif($appointment->status == 2) badge-danger
                    @endif">
                    @if($appointment->status == 0) Pending
                    @elseif($appointment->status == 1) Confirmed
                    @elseif($appointment->status == 2) Cancelled
                    @endif
                </span>


                <center>
                    <button type="button" class="btn btn-primary " data-mdb-toggle="modal"
                        data-mdb-target="#exampleModal">
                        <i class="fa fa-edit me-2"></i>Update Status
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                                    <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('update_status', ['client_id' => $appointment->client_id]) }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="col-md">
                                            <select class="form-select" name="status" aria-label="Small select example">
                                                <option value="0" {{ $appointment->status == 0 ? 'selected' : '' }}>Pending</option>
                                                <option value="1" {{ $appointment->status == 1 ? 'selected' : '' }}>Confirmed</option>
                                                <option value="2" {{ $appointment->status == 2 ? 'selected' : '' }}>Cancelled</option>
                                            </select>
                                        </div>
                                        <div class="form-outline mt-3">
                                            <textarea class="form-control" name="comment" id="textAreaExample" rows="4"></textarea>
                                            <label class="form-label" for="textAreaExample">Comment</label>
                                          </div>
                                    </div>
                                
                                    

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-secondary" href="/list_appointments">
                        <i class="fa-solid fa-chevron-left me-2"></i>Back to List
                    </a>
                </center>
            </div>
        </div>
    </div>
    @include('templates.sweetalert')
@endsection
