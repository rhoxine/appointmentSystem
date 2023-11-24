@include('templates.data_table_template')
@extends('templates.admin_layouts')
@section('content')
    <div class="container mt-2">
        <div class="card card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">List of Inventory</h5>
                    </div>

                    <div class="col">
                        <button type="button" class="btn btn-primary  float-end" data-mdb-toggle="modal"
                            data-mdb-target="#exampleModal">
                            <i class="fa fa-plus me-2"></i>Add Products
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('product.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-outline">
                                                <input type="text" name="product_name" id="typeText"
                                                    class="form-control" />
                                                <label class="form-label" for="typeText">Product Name</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="text" name="description" id="typeText"
                                                    class="form-control" />
                                                <label class="form-label" for="typeText">Description</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="number" name="price" id="typeText" class="form-control" />
                                                <label class="form-label" for="typeText">Price</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="number" name="quantity" id="typeText" class="form-control" />
                                                <label class="form-label" for="typeText">Quantity</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <input type="file" name="product_image" id="typeText"
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
                <div class="table-responsive">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        @if ($product->product_image)
                                            <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image"
                                                width="50" height="50">
                                        @else
                                        @endif
                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-primary" data-mdb-toggle="modal"
                                            data-mdb-target="#editProductModal{{ $product->product_id }}">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ route('product.delete', ['product_id' => $product->product_id]) }}"
                                            class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this product?');">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                                <?php $count++; ?>
                            @endforeach


                            @foreach ($products as $product)
                                <div class="modal fade" id="editProductModal{{ $product->product_id }}" tabindex="-1"
                                    aria-labelledby="editProductModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('product.update', ['id' => $product->product_id]) }}"
                                                method="POST">

                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $product->product_id }}">
                                                    <div class="form-outline">
                                                        <input type="text" name="product_name"
                                                            value="{{ $product->product_name }}" id="typeText"
                                                            class="form-control" />
                                                        <label class="form-label" for="typeText">Product Name</label>
                                                    </div>

                                                    <div class="form-outline mt-3">
                                                        <input type="text" name="description"
                                                            value="{{ $product->description }}" id="typeText"
                                                            class="form-control" />
                                                        <label class="form-label" for="typeText">Description</label>
                                                    </div>

                                                    <div class="form-outline mt-3">
                                                        <input type="text" name="price"
                                                            value="{{ $product->price }}" id="typeText"
                                                            class="form-control" />
                                                        <label class="form-label" for="typeText">Price</label>
                                                    </div>

                                                    <div class="form-outline mt-3">
                                                        <input type="text" name="quantity"
                                                            value="{{ $product->quantity }}" id="typeText"
                                                            class="form-control" />
                                                        <label class="form-label" for="typeText">Quantity</label>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-mdb-dismiss="modal">Cancel</button>
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary">Save</button>
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
    </div>
@endsection
