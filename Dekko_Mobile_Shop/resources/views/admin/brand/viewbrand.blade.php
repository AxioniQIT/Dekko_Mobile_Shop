@extends('layouts.admin')

@section('title', 'Brands')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="text-center mb-4">
        <h1 class="fw-bold"><i class="fas fa-cogs me-2"></i> Brands Management</h1>
        <p class="text-muted">Manage your brands and models efficiently</p>
    </div>

    <!-- Search Bar -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <input type="text" class="form-control mb-2 mb-sm-0" style="max-width: 250px;" id="searchBrand" placeholder="Search brands...">
        <button class="btn btn-success" data-url="{{ route('admin.brand.create') }}" data-size="md" data-ajax-popup="true" data-title="Add Brand">
            <i class="fas fa-plus me-2"></i> Add Brand
        </button>
    </div>

    <!-- Brand Table -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0"><i class="fas fa-table me-2"></i> Brand List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="brandTable">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Brand ID</th>
                            <th>Brand Name</th>
                            <th>Model Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->brand_id }}</td>
                                <td>{{ $brand->brand_name }}</td>
                                <td>{{ $brand->model_name }}</td>
                                <td>{{ $brand->description }}</td>
                                <td class="text-center">
                                    <button class="btn btn-outline-primary btn-sm"
                                        data-url="{{ route('admin.brand.edit', ['brand' => $brand->brand_id]) }}"
                                        data-size="md" data-ajax-popup="true" data-title="Edit Brand">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('admin.brand.destroy', ['brand' => $brand->brand_id]) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-outline-danger btn-sm show_confirm">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center bg-light">
            <small class="text-muted">Manage your brands and models</small>
        </div>
    </div>
</div>

<!-- Internal CSS -->
<style>
    .btn {
        min-width: 100px;
        align-items: right;
    }

    .show_confirm {
        cursor: pointer;
    }
</style>

<!-- Internal JS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Brand delete confirmation
        document.querySelectorAll('.show_confirm').forEach(function (button) {
            button.addEventListener('click', function () {
                if (confirm("Are you sure you want to delete this brand?")) {
                    button.closest('form').submit();
                }
            });
        });

        // Search functionality for brands
        document.getElementById('searchBrand').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#brandTable tbody tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const brandNameCell = cells[1]; // Brand Name column
                const modelNameCell = cells[2]; // Model Name column
                const descriptionCell = cells[3]; // Description column
                const match = brandNameCell.textContent.toLowerCase().includes(searchTerm) ||
                              modelNameCell.textContent.toLowerCase().includes(searchTerm) ||
                              descriptionCell.textContent.toLowerCase().includes(searchTerm);

                row.style.display = match ? '' : 'none';
            });
        });
    });
</script>
@endsection
