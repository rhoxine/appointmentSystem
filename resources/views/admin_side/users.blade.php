@include('templates.data_table_template')
@extends('templates.admin_layouts')
@section('content')
    <div class="container  mt-2">
        <div class="card card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">List of Users</h5>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary  float-end" data-mdb-toggle="modal"
                            data-mdb-target="#exampleModal">
                            <i class="fa fa-plus me-2"></i>Create User
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/adduser" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">


                                            <div class="form-outline">
                                                <input type="text" name="firstname" id="typeText"
                                                    class="form-control" />
                                                <label class="form-label" for="typeText">Firstname</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="text" name="lastname" id="typeText" class="form-control" />
                                                <label class="form-label" for="typeText">Lastname</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="text" name="username" id="typeText" class="form-control" />
                                                <label class="form-label" for="typeText">Username</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="password" name="confirm_password" id="typePassword"
                                                    class="form-control" />
                                                <label class="form-label" for="typePassword">Password</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="password" name="password" id="typePassword"
                                                    class="form-control" />
                                                <label class="form-label" for="typePassword">Confirm Password</label>
                                            </div>
                                            <div>
                                                <select class="form-select mt-3" name="user_type"
                                                    aria-label="Default select example">
                                                    <option selected>Administrator</option>
                                                    <option value="admin">Administrator</option>
                                                    <option value="staff">Staff</option>
                                                </select>
                                            </div>
                                            <input type="file" name="profile" class="form-control mt-3"
                                                id="customFile" />
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
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Username</th>
                                <th>User Type</th>
                                <th>Profile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $user->firstname }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->user_type }}</td>
                                    <td>
                                        @if ($user->profile)
                                            <img src="{{ asset('storage/' . $user->profile) }}" alt="Profile Image"
                                                width="50" height="50">
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary" data-mdb-toggle="modal"
                                            data-mdb-target="#editUserModal_{{ $user->user_id }}">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ route('users.delete', ['user_id' => $user->user_id]) }}"
                                            class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this user?');">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $count++; ?>
                            @endforeach

                            @foreach ($users as $user)
                                <div class="modal fade" id="editUserModal_{{ $user->user_id }}" tabindex="-1"
                                    aria-labelledby="editUserModalLabel_{{ $user->user_id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editUserModalLabel_{{ $user->user_id }}">Edit
                                                    User
                                                </h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('users.update', ['id' => $user->user_id]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                                <div class="modal-body">
                                                    <label>Firstname</label>
                                                    <div class="form-outline">
                                                        <input type="text" name="firstname"
                                                            value="{{ $user->firstname }}" id="typeText"
                                                            class="form-control" />
                                                    </div>
                                                    <label>Lastname</label>
                                                    <div class="form-outline">
                                                        <input type="text" name="lastname"
                                                            value="{{ $user->lastname }}" id="typeText"
                                                            class="form-control" />
                                                    </div>
                                                    <label>Username</label>
                                                    <div class="form-outline">
                                                        <input type="text" name="username"
                                                            value="{{ $user->username }}" id="typeText"
                                                            class="form-control" />
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
