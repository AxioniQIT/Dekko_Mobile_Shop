@extends('layouts.admin')

@section('title', 'Product Management')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="text-center mb-4">
        <h1 class="fw-bold"><i class="fas fa-boxes me-2"></i> Product Management</h1>
        <p class="text-muted">Manage your products efficiently and effectively</p>
    </div>

    <!-- Search and Add Product Section -->
    <div class="d-flex flex-wrap justify-content-between mb-3">
        <input type="text" class="form-control flex-grow-1 me-2 mb-2 mb-md-0" placeholder="Search products..." style="max-width: 300px;">
        <button class="btn btn-success d-flex align-items-center justify-content-center add-product-btn" onclick="openAddProductModal()">
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
    <div id="addProductModal" class="modal">
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

    <!-- Internal CSS -->
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
            width: 90%;
            max-width: 500px;
        }

        .btn {
            min-width: 100px;
        }

        .add-product-btn {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .add-product-btn:hover {
            background-color: #218838;
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
        let currentEditingProductId = null;

        function openAddProductModal() {
            currentEditingProductId = null;
            document.getElementById('modalTitle').textContent = 'Add Product';
            document.getElementById('productName').value = '';
            document.getElementById('productCategory').value = '';
            document.getElementById('productPrice').value = '';
            document.getElementById('productDescription').value = '';
            document.getElementById('addProductModal').style.display = 'flex';
        }

        function openEditProductModal(id, name, category, price, description) {
            currentEditingProductId = id;
            document.getElementById('modalTitle').textContent = 'Edit Product';
            document.getElementById('productName').value = name;
            document.getElementById('productCategory').value = category;
            document.getElementById('productPrice').value = price.replace('$', '');
            document.getElementById('productDescription').value = description;
            document.getElementById('addProductModal').style.display = 'flex';
        }

        function closeProductModal() {
            document.getElementById('addProductModal').style.display = 'none';
        }

        function saveProduct() {
            const name = document.getElementById('productName').value;
            const category = document.getElementById('productCategory').value;
            const price = document.getElementById('productPrice').value;
            const description = document.getElementById('productDescription').value;

            if (!name || !category || !price || !description) {
                alert('Please fill out all fields');
                return;
            }

            const tableBody = document.getElementById('productTableBody');

            if (currentEditingProductId) {
                const row = document.querySelector(`[data-product-id="${currentEditingProductId}"]`);
                row.innerHTML = `
                    <td>${name}</td>
                    <td>${category}</td>
                    <td>$${price}</td>
                    <td>${description}</td>
                    <td class="text-center">
                        <button class="btn btn-outline-primary btn-sm" onclick="openEditProductModal('${currentEditingProductId}', '${name}', '${category}', '$${price}', '${description}')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                `;
            } else {
                const newRow = document.createElement('tr');
                newRow.dataset.productId = Date.now();
                newRow.innerHTML = `
                    <td>${name}</td>
                    <td>${category}</td>
                    <td>$${price}</td>
                    <td>${description}</td>
                    <td class="text-center">
                        <button class="btn btn-outline-primary btn-sm" onclick="openEditProductModal('${Date.now()}', '${name}', '${category}', '$${price}', '${description}')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                `;
                tableBody.appendChild(newRow);
            }

            closeProductModal();
        }
    </script>
</div>
@endsection
