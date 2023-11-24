@extends('templates.admin_layouts')
@section('content')
    <div class="container mt-2">
        <div class="card card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Inquiry</h5>
                    </div>
                </div>
                <hr>

                @isset($inquiry)
                    <div class="form-outline mb-3" style="width: 300px;">
                        <textarea class="form-control" rows="5" style="resize: vertical; height: 250px;" readonly>{{ $inquiry->message }}</textarea>
                        <label class="form-label" for="formControlReadonly">Message</label>
                    </div>
                    <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                        Reply
                    </button>
                @endisset

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-outline">
                                    <input type="text" name="reply_message" value="" id="typeText"
                                        class="form-control" maxlength="255" />
                                    <!-- Adjust the 'maxlength' value as needed -->
                                    <label class="form-label" for="typeText">Message</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
