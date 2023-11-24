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

                                <form action="" method="">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-outline">
                                            <input type="text" name="category_name" id="typeText"
                                                class="form-control" />
                                            <label class="form-label" for="typeText">Category name</label>
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
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    
                        <tr>
                            <td></td>
                            <td></td>

                            <td>
                                <a href="#" class="btn btn-primary" data-mdb-toggle="modal"
                                    data-mdb-target="#editCategoryModal">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href=""
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this category?');">
                                    <i class="fa fa-trash"></i>
                                </a>

                            </td>
                          
                        </tr>
                    
                        <div class="modal fade" id="editCategoryModal" tabindex="-1"
                            aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action=""
                                        method="POST">

                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="category_id"
                                                value="">
                                            <div class="form-outline">
                                                <input type="text" name="category_name"
                                                    value="" id="typeText"
                                                    class="form-control" />
                                                <label class="form-label" for="typeText">Firstname</label>
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



@include('templates.sweetalert')
@endsection
