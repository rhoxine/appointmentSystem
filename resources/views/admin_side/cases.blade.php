@include('templates.data_table_template')
@extends('templates.admin_layouts')
@section('content')

<div class="container mt-2">
    <div class="card card-outline">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="card-title">Special Cases</h5>
                </div>
                <div class="col">

                    <button type="button" class="btn btn-primary  float-end" data-mdb-toggle="modal"
                        data-mdb-target="#exampleModal">
                        <i class="fa fa-plus me-2"></i>Add New Cases
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Cases</h5>
                                    <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form action="{{ route('cases.store') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-outline">
                                            <input type="text" name="owner_name" id="typeText"
                                                class="form-control" />
                                            <label class="form-label" for="typeText">Owner name</label>
                                        </div>
                                        <div class="form-outline mt-2">
                                            <input type="text" name="pet_name" id="typeText"
                                                class="form-control" />
                                            <label class="form-label" for="typeText">Pet name</label>
                                        </div>
                                        <div class="form-outline mt-2">
                                            <input type="text" name="age" id="typeText"
                                                class="form-control" />
                                            <label class="form-label" for="typeText">Age</label>
                                        </div>
                                        <div class="form-outline mt-2">
                                            <input type="text" name="pet_type" id="typeText"
                                                class="form-control" />
                                            <label class="form-label" for="typeText">Pet Type</label>
                                        </div>
                                        
                                        <div>
                                            <select class="form-select mt-3" name="service_id"
                                                aria-label="Small select example">
                                                <option selected>Select a Service</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->service_id }}">
                                                        {{ $service->service }}</option>
                                                @endforeach
                                            </select>

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
                        <th>Owner Name</th>
                        <th>Pet Name</th>
                        <th>Age</th>
                        <th>Pet Type</th>
                        <th>Service Availed</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    
                    <?php $count = 1; ?>
                    @foreach ($cases as $case)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $case->owner_name }}</td>
                            <td>{{ $case->pet_name}}</td>
                            <td>{{ $case->age }}</td>
                            <td>{{ $case->pet_type }}</td>
                            <td>
                                @foreach ($services as $service)
                                    @if ($service->service_id === $case->service_id)
                                        {{ $service->service }}
                                    @endif
                                @endforeach
                            </td>

                            <td>
                                <a href="#" class="btn btn-primary" data-mdb-toggle="modal"
                                    data-mdb-target="#editCaseModal{{ $case->special_case_id }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{ route('case.delete', ['special_case_id' => $case->special_case_id]) }}"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this category?');">
                                    <i class="fa fa-trash"></i>
                                </a>

                            </td>
                          
                        </tr>
                        <?php $count++ ; ?>
                        @endforeach
                    
                        @foreach ($cases as $special_case)
                        <div class="modal fade" id="editCaseModal{{ $special_case->special_case_id }}" tabindex="-1"
                            aria-labelledby="editCaseModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editCaseModalLabel">Edit Case</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('case.update', ['id' => $special_case->special_case_id]) }}"
                                        method="POST">

                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="special_case_id"
                                                value="">
                                            <div class="form-outline">
                                                <input type="text" name="owner_name"
                                                    value="" id="typeText"
                                                    class="form-control" />
                                                <label class="form-label" for="typeText">owner Name</label>
                                            </div>
                                            <div class="form-outline">
                                                <input type="text" name="pet_name"
                                                    value="" id="typeText"
                                                    class="form-control" />
                                                <label class="form-label" for="typeText">Pet Name</label>
                                            </div>
                                            <div class="form-outline">
                                                <input type="text" name="age"
                                                    value="" id="typeText"
                                                    class="form-control" />
                                                <label class="form-label" for="typeText">Age</label>
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
                    
                        @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>



@include('templates.sweetalert')
@endsection
