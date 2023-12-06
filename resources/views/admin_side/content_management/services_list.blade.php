@include('templates.data_table_template')
@extends('templates.admin_layouts')
@section('content')
    <div class="container  mt-2">
        <div class="card card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Sevices Management List</h5>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary  float-end" data-mdb-toggle="modal"
                            data-mdb-target="#exampleModal">
                            <i class="fa fa-plus me-2"></i>Add Services Information
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Services Information</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('service_list.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-outline">
                                                <input type="text" name="service_name" id="typeText"
                                                    class="form-control" />
                                                <label class="form-label" for="typeText">Service name</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="text" name="fee" id="typeText" class="form-control" />
                                                <label class="form-label" for="typeText">Service Fee</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="file" name="service_img" id="typeText"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-mdb-dismiss="modal">Cancel</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Service</th>
                            <th>Service Fee</th>
                            <th>Service Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>

                        <?php $count = 1; ?>
                        @foreach ($services_list as $service)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $service->service_name }}</td>
                                <td>{{ $service->fee }}</td>
                                <td>
                                    <div class="image-container">
                                        <img src="{{ asset('storage/' . $service->service_img) }}" alt="Profile Image"
                                            width="50" height="50">
                                    </div>
                                </td>

                                <td>
                                    <a href="#" class="btn btn-primary" data-mdb-toggle="modal"
                                        data-mdb-target="#editServiceListModal{{ $service->services_id }}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="{{ route('service_info.delete', ['services_id' => $service->services_id]) }}"
                                        class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this service information?');">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $count++; ?>
                        @endforeach




                        @foreach ($services_list as $service)
                            <div class="modal fade" id="editServiceListModal{{ $service->services_id }}" tabindex="-1"
                                aria-labelledby="editServiceListModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editServiceListModalLabel">Edit Service</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('service_info.update', ['id' => $service->services_id]) }}"
                                            method="POST" enctype="multipart/form-data">

                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="services_id"
                                                    value="{{ $service->services_id }}">
                                                <div class="form-outline">
                                                    <input type="text" name="service_name"
                                                        value="{{ $service->service_name }}" id="typeText"
                                                        class="form-control" />
                                                    <label class="form-label" for="typeText">Service</label>
                                                </div>
                                                <div class="form-outline mt-3">
                                                    <input type="text" name="fee" value="{{ $service->fee }}"
                                                        id="typeText" class="form-control" />
                                                    <label class="form-label" for="typeText">Service Fee</label>
                                                </div>

                                               
                                                <div class="form-outline mt-3">
                                                    <input type="file" name="service_img" id="typeText" class="form-control" />
                                                </div><br>
                                                <center>
                                                @if ($service->service_img)
                                                <div class="image-container">
                                                    <img src="{{ asset('storage/' . $service->service_img) }}" alt="Current Image" width="150" height="100">
                                                </div>
                                            @endif
                                        </center>
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-mdb-dismiss="modal">Cancel</button>
                                                <button type="submit" name="submit"
                                                    class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    @include('templates.sweetalert')
@endsection
