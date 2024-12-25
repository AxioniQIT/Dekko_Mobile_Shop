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
        <button class="btn btn-success" onclick="openAddProductModal()">
            <i class="fas fa-plus me-2"></i> Add Product
        </button>
    </div>

    <!-- Product Table -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0"><i class="fas fa-table me-2"></i> Product List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="productTable">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="productTableBody">
                        <tr>
                            <td>Smartphone</td>
                            <td>Electronics</td>
                            <td>$699</td>
                            <td>Latest model with advanced features</td>
                            <td class="text-center">
                                <button class="btn btn-outline-primary btn-sm" onclick="openEditProductModal('1', 'Smartphone', 'Electronics', '$699', 'Latest model with advanced features')">
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
            <small class="text-muted">Manage your products with ease</small>
        </div>
    </div>

    <!-- Add/Edit Product Modal -->
    <div id="addProductModal" class="modal" style="display: none;">
        <div class="modal-content p-4">
            <h4 id="modalTitle" class="mb-3 text-primary"><i class="fas fa-plus-circle"></i> Add Product</h4>
            <form id="productForm">
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" placeholder="Enter product name">
                </div>
                <div class="mb-3">
                    <label for="productCategory" class="form-label">Category</label>
                    <select class="form-control" id="productCategory">
                        <option value="">Select a category</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Apparel">Apparel</option>
                        <option value="Home Appliances">Home Appliances</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Price</label>
                    <input type="number" class="form-control" id="productPrice" placeholder="Enter product price">
                </div>
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="productDescription" rows="4" placeholder="Enter product description"></textarea>
                </div>
                <button type="button" class="btn btn-success" onclick="saveProduct()">
                    <i class="fas fa-check"></i> Save
                </button>
                <button type="button" class="btn btn-secondary" onclick="closeProductModal()">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        let editingProductId = null;

        // Open Add Product Modal
        function openAddProductModal() {
            document.getElementById('modalTitle').textContent = 'Add Product';
            clearProductForm();
            editingProductId = null;
            document.getElementById('addProductModal').style.display = 'flex';
        }

        // Open Edit Product Modal
        function openEditProductModal(id, name, category, price, description) {
            document.getElementById('modalTitle').textContent = 'Edit Product';
            document.getElementById('productName').value = name;
            document.getElementById('productCategory').value = category;
            document.getElementById('productPrice').value = price;
            document.getElementById('productDescription').value = description;
            editingProductId = id;
            document.getElementById('addProductModal').style.display = 'flex';
        }

        // Save Product
        function saveProduct() {
            const name = document.getElementById('productName').value;
            const category = document.getElementById('productCategory').value;
            const price = document.getElementById('productPrice').value;
            const description = document.getElementById('productDescription').value;

            if (editingProductId) {
                // Update existing product row
                const rows = document.querySelectorAll('table tbody tr');
                rows.forEach(row => {
                    if (row.cells[0].textContent === editingProductId) {
                        row.cells[1].textContent = name;
                        row.cells[2].textContent = category;
                        row.cells[3].textContent = price;
                        row.cells[4].textContent = description;
                    }
                });
            } else {
                // Add new product row
                const table = document.querySelector('table tbody');
                const newRow = table.insertRow();
                const newId = table.rows.length;
                newRow.innerHTML = `
                    <td>${newId}</td>
                    <td>${name}</td>
                    <td>${category}</td>
                    <td>${price}</td>
                    <td>${description}</td>
                    <td class="text-center">
                        <button class="btn btn-outline-primary btn-sm" onclick="openEditProductModal('${newId}', '${name}', '${category}', '${price}', '${description}')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                `;
            }

            closeProductModal();
        }

        // Close Product Modal
        function closeProductModal() {
            document.getElementById('addProductModal').style.display = 'none';
        }

        // Clear Product Form
        function clearProductForm() {
            document.getElementById('productName').value = '';
            document.getElementById('productCategory').value = '';
            document.getElementById('productPrice').value = '';
            document.getElementById('productDescription').value = '';
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
