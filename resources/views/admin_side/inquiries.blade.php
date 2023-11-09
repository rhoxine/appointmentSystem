@include('templates.data_table_template')
@extends('templates.admin_sidenav')
@section('content')
    <div class="container  mt-2">
        <div class="card card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">List of Inquiries</h5>
                    </div>

                </div>
                <hr>
                <table id="myTable" class="display">
                    <thead>
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
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>
                                <a class="btn btn-primary btn-sm rounded-pill" data-bs-toggle="modal" data-mdb-target=""
                                    href="">
                                    Pending
                                </a>
                            </td>
                            <td> 
                                <a class="btn btn-secondary" data-bs-toggle="modal" data-mdb-target="" href="">
                                    <i class="fa fa-eye"></i>
                                </a>
                                
                                <a class="btn btn-primary " data-bs-toggle="modal" data-mdb-target="" href="">
                                <i class="fa fa-edit"></i>
                            </a>


                            <a class="btn btn-danger" data-bs-toggle="modal" data-mdb-target="" href="">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
