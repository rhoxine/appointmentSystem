{{-- @include('templates.data_table_template') --}}
@extends('templates.admin_layouts')
@section('content')
    <div class="container  mt-2">
        @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong>{{ session("success") }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="card card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">List of Inquiries</h5>
                    </div>

                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0 bg-white text-center">
                        <thead class="bg-light">
                            <tr>
                                <th>#</th>
                                <th>Inquirer</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
    
                            <?php $count = 1; ?>
                            @foreach ($inquiries as $inquiry)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $inquiry->name }}</td>
                                    <td>{{ $inquiry->email }}</td>
                                    <td class="ellipsis">{{ $inquiry->message }}</td>
                                    <td>
                                        <a class="badge rounded-pill badge-success" data-bs-toggle="modal" data-mdb-target=""
                                            href="">
                                            Read
                                        </a>
                                    </td>
    
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{ route('admin_side/view_message', ['inquiry_id' => $inquiry->inquiry_id]) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
    
                                        <a href="{{ route('inquiry.delete', ['inquiry_id' => $inquiry->inquiry_id]) }}"
                                            class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this message?');">
                                            <i class="fa fa-trash"></i>
                                        </a>
    
                                    </td>
    
                                </tr>
                                <?php $count++; ?>
                            @endforeach
    
    
    
    
    
                            <div class="modal fade" id="editInquiryModal" tabindex="-1" aria-labelledby="editInquiryModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editInquiryModalLabel">Reply</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="" method="">
    
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="inquiry_id" value="">
                                                <div class="form-outline">
                                                    <input type="text" name="reply" value="" id="typeText"
                                                        class="form-control" />
                                                    <label class="form-label" for="typeText">Reply</label>
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
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    @include('templates.sweetalert')
@endsection
