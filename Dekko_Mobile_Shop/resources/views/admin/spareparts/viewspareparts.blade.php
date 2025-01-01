@extends('layouts.admin')

@section('title', 'Spareparts')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="text-center mb-4">
        <h1 class="fw-bold"><i class="fas fa-cogs me-2"></i> Spareparts Management</h1>
        <p class="text-muted">Manage your spare parts efficiently</p>
    </div>

    <!-- Search Bar -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <input type="text" class="form-control mb-2 mb-sm-0" style="max-width: 250px;" id="searchSparepart" placeholder="Search spareparts...">
        <button class="btn btn-success" data-url="{{ route('admin.spareparts.create') }}" data-size="md" data-ajax-popup="true" data-title="Add Sparepart">
            <i class="fas fa-plus me-2"></i> Add Sparepart
        </button>
    </div>

    <!-- Spareparts Table -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0"><i class="fas fa-table me-2"></i> Sparepart List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="sparepartTable">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Sparepart ID</th>
                            <th>Sparepart Name</th>
                            <th>Brand Name</th>
                            <th>Model Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spareParts as $sparepart)
                            <tr>
                                <td>{{ $sparepart->spare_part_id }}</td>
                                <td>{{ $sparepart->name }}</td>
                                <td>
                                    @foreach ($sparepart->brands as $brand)
                                        {{ $brand->brand_name }}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($sparepart->brands as $brand)
                                        {{ $brand->model_name }}
                                    @endforeach
                                </td>
                                <td>{{ $sparepart->description }}</td>
                                <td>{{ $sparepart->price }}</td>
                                <td>{{ $sparepart->stock_quantity }}</td>
                                <td class="text-center">
                                    <button class="btn btn-outline-primary btn-sm"
                                            data-url="{{ route('admin.spareparts.edit', ['sparePart' => $sparepart->spare_part_id]) }}"
                                            data-size="md" data-ajax-popup="true" data-title="Edit Sparepart">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('admin.spareparts.destroy', ['sparePart' => $sparepart->spare_part_id]) }}"
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
            <small class="text-muted">Manage your spare parts with ease</small>
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

    @media (max-width: 576px) {
        .d-flex {
            flex-direction: column;
            align-items: flex-start;
        }

        .d-flex .form-control {
            margin-bottom: 10px;
        }
    }
</style>

<!-- Internal JS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.show_confirm').forEach(function (button) {
            button.addEventListener('click', function () {
                if (confirm("Are you sure you want to delete this sparepart?")) {
                    button.closest('form').submit();
                }
            });
        });

        // Search functionality
        document.getElementById('searchSparepart').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#sparepartTable tbody tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const nameCell = cells[1];  // Sparepart Name column
                const brandCell = cells[2];  // Brand Name column
                const descriptionCell = cells[4]; // Description column
                const match = nameCell.textContent.toLowerCase().includes(searchTerm) ||
                              brandCell.textContent.toLowerCase().includes(searchTerm) ||
                              descriptionCell.textContent.toLowerCase().includes(searchTerm);

                row.style.display = match ? '' : 'none';
            });
        });
    });
</script>
@endsection
