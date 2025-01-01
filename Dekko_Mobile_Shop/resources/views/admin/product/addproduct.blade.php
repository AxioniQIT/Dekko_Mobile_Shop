@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Create Product</h1>
    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name:</label>
                <input type="text" class="form-control" name="product_name" id="product_name" required>
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Brand:</label>
                <input type="text" class="form-control" name="brand" id="brand">
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Model:</label>
                <input type="text" class="form-control" name="model" id="model">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" class="form-control" name="price" id="price" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="stock_quantity" class="form-label">Stock Quantity:</label>
                <input type="number" class="form-control" name="stock_quantity" id="stock_quantity" required>
            </div>
            <div class="mb-3">
                <label for="reorder_threshold" class="form-label">Reorder Threshold:</label>
                <input type="number" class="form-control" name="reorder_threshold" id="reorder_threshold">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <select class="form-select" name="category_id" id="category_id" required>
                    <option value="" disabled selected>-- Select a Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success px-4">Create Product</button>
            </div>
        </form>
    </div>
</div>
@endsection
