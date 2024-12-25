@extends('layouts.admin')

@section('title', 'Brand Management')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="text-center mb-4">
        <h1 class="fw-bold"><i class="fas fa-tags me-2"></i> Brand Management</h1>
        <p class="text-muted">Manage your brands and models efficiently</p>
    </div>

    <!-- Widgets Section -->
    <div class="row mb-4 text-center">
        <div class="col-md-4">
            <div class="card shadow-sm bg-primary text-white p-3">
                <i class="fas fa-tags fa-2x mb-2"></i>
                <h5>Total Brands</h5>
                <h3>15</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm bg-success text-white p-3">
                <i class="fas fa-mobile-alt fa-2x mb-2"></i>
                <h5>Total Models</h5>
                <h3>50</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm bg-warning text-dark p-3">
                <i class="fas fa-user-check fa-2x mb-2"></i>
                <h5>New Brands Added</h5>
                <h3>3</h3>
            </div>
        </div>
    </div>

    <!-- Search and Add Brand -->
    <div class="d-flex justify-content-between mb-3">
        <input type="text" class="form-control d-inline-block" style="width: 200px;" placeholder="Search brands...">
        <button class="btn btn-primary" onclick="openAddBrandModal()">
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
                        <th scope="col">#</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Model Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Samsung</td>
                        <td>Galaxy S Series</td>
                        <td>Premium smartphones by Samsung</td>
                        <td class="text-center">
                            <button class="btn btn-outline-primary btn-sm me-2" onclick="openEditBrandModal(1, 'Samsung', 'Galaxy S Series', 'Premium smartphones by Samsung')">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Apple</td>
                        <td>iPhone</td>
                        <td>High-end devices from Apple</td>
                        <td class="text-center">
                            <button class="btn btn-outline-primary btn-sm me-2" onclick="openEditBrandModal(2, 'Apple', 'iPhone', 'High-end devices from Apple')">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-center bg-light">
        <small class="text-muted">Manage your brands and models with ease</small>
    </div>
</div>

<!-- Add/Edit Brand Modal -->
<div id="brandModal" class="modal" style="display: none;">
    <div class="modal-content p-4">
        <h4 id="modalTitle" class="mb-3 text-primary"><i class="fas fa-tags"></i> Add Brand</h4>
        <form id="brandForm">
            <div class="mb-3">
                <label for="brandName" class="form-label">Brand Name</label>
                <input type="text" class="form-control" id="brandName" placeholder="Enter brand name">
            </div>
            <div class="mb-3">
                <label for="modelName" class="form-label">Model Name</label>
                <input type="text" class="form-control" id="modelName" placeholder="Enter model name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" placeholder="Enter description"></textarea>
            </div>
            <button type="button" class="btn btn-success" onclick="saveBrand()">
                <i class="fas fa-check"></i> Save
            </button>
            <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
        </form>
    </div>
</div>

<script>
    let editingBrandId = null;

    function openAddBrandModal() {
        document.getElementById('modalTitle').textContent = 'Add Brand';
        clearForm();
        editingBrandId = null;
        document.getElementById('brandModal').style.display = 'flex';
    }

    function openEditBrandModal(id, name, model, description) {
        document.getElementById('modalTitle').textContent = 'Edit Brand';
        document.getElementById('brandName').value = name;
        document.getElementById('modelName').value = model;
        document.getElementById('description').value = description;
        editingBrandId = id;
        document.getElementById('brandModal').style.display = 'flex';
    }

    function saveBrand() {
        const name = document.getElementById('brandName').value;
        const model = document.getElementById('modelName').value;
        const description = document.getElementById('description').value;

        if (editingBrandId) {
            const rows = document.querySelectorAll('table tbody tr');
            rows.forEach(row => {
                if (row.cells[0].textContent == editingBrandId) {
                    row.cells[1].textContent = name;
                    row.cells[2].textContent = model;
                    row.cells[3].textContent = description;
                }
            });
        } else {
            const table = document.querySelector('table tbody');
            const newRow = table.insertRow();
            const newId = table.rows.length;
            newRow.innerHTML = `
                <td>${newId}</td>
                <td>${name}</td>
                <td>${model}</td>
                <td>${description}</td>
                <td class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="openEditBrandModal(${newId}, '${name}', '${model}', '${description}')">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            `;
        }

        closeModal();
    }

    function closeModal() {
        document.getElementById('brandModal').style.display = 'none';
    }

    function clearForm() {
        document.getElementById('brandName').value = '';
        document.getElementById('modelName').value = '';
        document.getElementById('description').value = '';
    }
</script>

<style>
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: #fff;
        border-radius: 8px;
        padding: 20px;
        width: 80%;
        max-width: 600px;
    }
</style>
@endsection
