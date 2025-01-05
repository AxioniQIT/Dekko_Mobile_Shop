@extends('layouts.admin')

@section('title', 'Product Management')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="text-center mb-4">
        <h1 class="fw-bold"><i class="fas fa-boxes me-2"></i> Product Management</h1>
        <p class="text-muted">Manage your products efficiently and effectively</p>
    </div>

    <!-- Widgets Section -->
    <div class="row mb-4 text-center">
        <div class="col-md-4">
            <div class="card shadow-sm bg-primary text-white p-3">
                <i class="fas fa-box-open fa-2x mb-2"></i>
                <h5>Total Products</h5>
                <h3>250</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm bg-success text-white p-3">
                <i class="fas fa-tags fa-2x mb-2"></i>
                <h5>Categories</h5>
                <h3>15</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm bg-warning text-dark p-3">
                <i class="fas fa-dollar-sign fa-2x mb-2"></i>
                <h5>Total Sales</h5>
                <h3>$12,345</h3>
            </div>
        </div>
    </div>

    <!-- Search and Add Product -->
    <div class="d-flex justify-content-between mb-3">
        <input type="text" class="form-control d-inline-block" style="width: 200px;" placeholder="Search products...">




        <a href="#" data-ajax-popup="true" data-url="{{ route('admin.products.create') }}">
            <button class="btn btn-success"> <i class="fas fa-plus me-2"></i>Add Product </button>
        </a>




        <a href="{{ route('admin.product.categories.view') }}"><button class="btn btn-dark"> <i class="fas fa-plus me-2"></i>Add New Category </button></a>
    </div>

    <!-- Product Table -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0"><i class="fas fa-table me-2"></i> Product List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>model</th>
                            <th>Price</th>
                            <th>Stock</th>
                            {{-- reorder threshold --}}
                            <th>reorder</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->product_id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->category->category_name ?? 'N/A' }}</td>
                                <td>{{ $product->model }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock_quantity }}</td>
                                <td>{{ $product->reorder_threshold}}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product->product_id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product->product_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center bg-light">
            <small class="text-muted">Manage your products with ease</small>
        </div>
    </div>

    <!-- Modal for AJAX -->
<div class="modal fade" id="commanModel" tabindex="-1" aria-labelledby="commanModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commanModelLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Dynamic content will be loaded here -->
            </div>
        </div>
    </div>
</div>

    <script src="{{ asset('js/custom.js') }}"></script>

</div>
@endsection
