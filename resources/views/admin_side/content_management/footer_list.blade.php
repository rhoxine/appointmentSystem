@include('templates.data_table_template')
@extends('templates.admin_layouts')
@section('content')
    <div class="container  mt-2">
        <div class="card card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Footer Management List</h5>
                    </div>
                    <div class="col">
                        @if(count($footers) == 0)
                            <button type="button" class="btn btn-primary float-end" data-mdb-toggle="modal"
                                data-mdb-target="#exampleModal">
                                <i class="fa fa-plus me-2"></i>Add Footer Information
                            </button>
                        @else
                            <button type="button" class="btn btn-primary float-end" disabled>
                                <i class="fa fa-plus me-2"></i>Add Footer Information
                            </button>
                        @endif

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Footer Information</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('footer.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-outline">
                                                <input type="text" name="contact_number" id="typeText" class="form-control" />
                                                <label class="form-label" for="typeText">Contact Number</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="text" name="email_address" id="typeText"
                                                    class="form-control" />
                                                <label class="form-label" for="typeText">Email Address</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="text" name="location" id="typeText"
                                                    class="form-control" />
                                                <label class="form-label" for="typeText">Location</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="text" name="work_hours" id="typeText"
                                                    class="form-control" />
                                                <label class="form-label" for="typeText">Working Hours</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="text" name="copyright" id="typeText"
                                                    class="form-control" />
                                                <label class="form-label" for="typeText">Copyright Information</label>
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
                <div class="table-responsive">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Contact Number</th>
                                <th>Email Address</th>
                                <th>Location</th>
                                <th>Working Hours</th>
                                <th>Copyright</th>
                                <th>Action</th>
                            </tr>
                        </thead>
    
    
                        <tbody>
                           <?php $count = 1;?>
                           @foreach($footers as $footer)
                           
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$footer->contact_number}}</td>
                                    <td>{{$footer->email_address}}</td>
                                    <td>{{$footer->location}}</td>
                                    <td>{{$footer->work_hours}}</td>
                                    <td>{{$footer->copyright}}</td>
    
                                    <td>
                                        <a href="#" class="btn btn-primary" data-mdb-toggle="modal"
                                            data-mdb-target="#editFooterInfoModal{{ $footer->footer_id }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
    
                                    </td>
                                    </td>
                                </tr>
                          
                                <?php $count++; ?>
                                @endforeach
    
    
                                @foreach ($footers as $footer_info)
                                <div class="modal fade" id="editFooterInfoModal{{ $footer_info->footer_id }}" tabindex="-1"
                                    aria-labelledby="editFooterInfoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editFooterInfoModalLabel">Edit Service</h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('footer.update', ['id' => $footer_info->footer_id]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="services_id" value="{{ $footer->footer_id }}">
                                                    <div class="form-outline">
                                                        <input type="text" name="contact_number" value="{{ $footer->contact_number }}"
                                                            id="typeText" class="form-control" />
                                                        <label class="form-label" for="typeText">Contact Number</label>
                                                    </div>
                                                    <div class="form-outline mt-3">
                                                        <input type="text" name="email_address"
                                                            value="{{ $footer->email_address }}" id="typeText"
                                                            class="form-control" />
                                                        <label class="form-label" for="typeText">Email Address</label>
                                                    </div>
                                                    <div class="form-outline mt-3">
                                                        <input type="text" name="location"
                                                            value="{{ $footer->location }}" id="typeText"
                                                            class="form-control" />
                                                        <label class="form-label" for="typeText">Location</label>
                                                    </div>
                                                    <div class="form-outline mt-3">
                                                        <input type="text" name="work_hours"
                                                            value="{{ $footer->work_hours }}" id="typeText"
                                                            class="form-control" />
                                                        <label class="form-label" for="typeText">Working Hours</label>
                                                    </div>
                                                    <div class="form-outline mt-3">
                                                        <input type="text" name="copyright"
                                                            value="{{ $footer->copyright }}" id="typeText"
                                                            class="form-control" />
                                                        <label class="form-label" for="typeText">Copyright</label>
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
    </div>

    @include('templates.sweetalert')
@endsection
