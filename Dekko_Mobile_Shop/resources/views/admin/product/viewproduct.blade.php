@extends('layouts.admin')

@section('title', 'Product Management')

@section('content')
<div class="container mt-4">
    <!-- Dashboard Header -->
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

    <!-- Filters and Actions -->
    <div class="d-flex justify-content-between mb-3">
        <div>
            <input type="text" class="form-control d-inline-block" style="width: 200px;" placeholder="Search products...">
            <select class="form-control d-inline-block ms-2" style="width: 200px;">
                <option value="">Filter by Category</option>
                <option value="Electronics">Electronics</option>
                <option value="Apparel">Apparel</option>
                <option value="Home Appliances">Home Appliances</option>
            </select>
        </div>
        <div>
            <button class="btn btn-outline-danger me-2"><i class="fas fa-file-pdf"></i> Download PDF</button>
            <button class="btn btn-outline-primary me-2"><i class="fas fa-file-csv"></i> Download CSV</button>
            <button class="btn btn-success" onclick="openAddProductModal()">
                <i class="fas fa-plus me-2"></i> Add Product
            </button>
        </div>
    </div>

    <!-- Product Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-sm" id="productTable">
            <thead class="table-dark text-center">
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
                        <button class="btn btn-info btn-sm" onclick="openEditProductModal('Smartphone', 'Electronics', 699, 'Latest model with advanced features')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="deleteProduct(this)">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                <!-- Additional rows here -->
            </tbody>
        </table>
    </div>
</div>

<!-- Add/Edit Product Modal -->
<div id="addProductModal" class="modal">
    <div class="modal-content p-4">
        <h4 id="modalTitle" class="mb-4 text-primary"><i class="fas fa-plus-circle"></i> Add/Edit Product</h4>
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
            <div class="mb-3">
                <label for="productImage" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="productImage">
            </div>
            <button type="button" class="btn btn-success me-2" onclick="saveProduct()">
                <i class="fas fa-check"></i> Save
            </button>
            <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
        </form>
    </div>
</div>

<script>
    let editingRow = null;

    // Open Add Product Modal
    function openAddProductModal() {
        document.getElementById('modalTitle').textContent = 'Add Product';
        clearForm();
        editingRow = null;
        document.getElementById('addProductModal').style.display = 'flex';
    }

    // Open Edit Product Modal
    function openEditProductModal(name, category, price, description) {
        document.getElementById('modalTitle').textContent = 'Edit Product';
        document.getElementById('productName').value = name;
        document.getElementById('productCategory').value = category;
        document.getElementById('productPrice').value = price;
        document.getElementById('productDescription').value = description;
        editingRow = event.target.closest('tr');
        document.getElementById('addProductModal').style.display = 'flex';
    }

    // Save Product
    function saveProduct() {
        const name = document.getElementById('productName').value;
        const category = document.getElementById('productCategory').value;
        const price = document.getElementById('productPrice').value;
        const description = document.getElementById('productDescription').value;

        if (editingRow) {
            editingRow.cells[0].textContent = name;
            editingRow.cells[1].textContent = category;
            editingRow.cells[2].textContent = `$${price}`;
            editingRow.cells[3].textContent = description;
        } else {
            const table = document.getElementById('productTableBody');
            const newRow = table.insertRow();
            newRow.innerHTML = `
                <td>${name}</td>
                <td>${category}</td>
                <td>$${price}</td>
                <td>${description}</td>
                <td class="text-center">
                    <button class="btn btn-info btn-sm" onclick="openEditProductModal('${name}', '${category}', ${price}, '${description}')">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="deleteProduct(this)">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            `;
        }
        closeModal();
    }

    // Delete Product
    function deleteProduct(button) {
        if (confirm('Are you sure you want to delete this product?')) {
            const row = button.closest('tr');
            row.remove();
        }
    }

    // Close Modal
    function closeModal() {
        document.getElementById('addProductModal').style.display = 'none';
    }

    // Clear Form
    function clearForm() {
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
