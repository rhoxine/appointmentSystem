@include('templates.data_table_template')
@extends('templates.admin_sidenav')
@section('content')
    <div class="container  mt-2">
        <div class="card card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">List of Services</h5>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary  float-end" data-mdb-toggle="modal"
                            data-mdb-target="#exampleModal">
                            <i class="fa fa-plus me-2"></i>Add Services
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('services.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-outline">
                                                <input type="text" name="service" id="typeText" class="form-control" />
                                                <label class="form-label" for="typeText">Service</label>
                                            </div>
                                            <div>
                                                {{-- <select class="form-select mt-3" name="category_name"
                                                    aria-label="Small select example">
                                                    <option selected>Select a Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->category_name }}">
                                                            {{ $category->category_name }}</option>
                                                    @endforeach
                                                </select> --}}
                                                <select class="form-select mt-3" name="category_id" aria-label="Small select example">
                                                    <option selected>Select a Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="number" name="service_fee" id="typeText"
                                                    class="form-control" />
                                                <label class="form-label" for="typeText">Fee</label>
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
                            <th>Category</th>
                            <th>Service Fee</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $service->service }}</td>
                                <td> @foreach ($categories as $category)
                                    @if ($category->category_id === $service->category_id)
                                        {{ $category->category_name }}
                                    @endif
                                @endforeach</td>
                                <td>{{ $service->service_fee }}</td>

                                <td>
                                    <a href="#" class="btn btn-primary" data-mdb-toggle="modal"
                                        data-mdb-target="#editServiceModal{{ $service->service_id }}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="{{ route('services.delete', ['service_id' => $service->service_id]) }}"
                                        class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this service?');">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                </td>
                            </tr>
                            <?php $count++; ?>
                        @endforeach



                        @foreach ($services as $service)
                            <div class="modal fade" id="editServiceModal{{ $service->service_id }}" tabindex="-1"
                                aria-labelledby="editServiceModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('services.update', ['id' => $service->service_id]) }}"
                                            method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="service_id" value="{{ $service->service_id }}">
                                                <div class="form-outline">
                                                    <input type="text" name="service" value="{{ $service->service }}"
                                                        id="typeText" class="form-control" />
                                                    <label class="form-label" for="typeText">Service</label>
                                                </div>
                                                <div class="form-outline mt-3">
                                                    <input type="number" name="service_fee"
                                                        value="{{ $service->service_fee }}" id="typeText"
                                                        class="form-control" />
                                                    <label class="form-label" for="typeText">Service Fee</label>
                                                </div>
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
