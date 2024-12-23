@extends('layouts.admin')

@section('title', 'View Products')

@section('content')
<div class="container mt-4">
    <!-- Header Section -->
    <div class="text-center mb-4">
        <h1 class="fw-bold"><i class="fas fa-boxes me-2"></i> Product Management</h1>
        <p class="text-muted">View and manage all products in your inventory</p>
    </div>

    <!-- Filter and Actions -->
    <div class="d-flex justify-content-between mb-3">
        <div>
            <input type="text" class="form-control d-inline-block" style="width: 200px;" placeholder="Search products..." oninput="searchProduct(this.value)">
            <select class="form-control d-inline-block ms-2" style="width: 200px;" onchange="filterCategory(this.value)">
                <option value="">Filter by Category</option>
                <option value="Electronics">Electronics</option>
                <option value="Apparel">Apparel</option>
                <option value="Home Appliances">Home Appliances</option>
            </select>
        </div>
        <div>
            <button class="btn btn-success" onclick="openAddProductModal()">
                <i class="fas fa-plus me-2"></i> Add Product
            </button>
        </div>
    </div>

    <!-- Product Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-sm">
            <thead class="table-dark text-center">
                <tr>
                    <th><i class="fas fa-image"></i> Image</th>
                    <th><i class="fas fa-box"></i> Product Name</th>
                    <th><i class="fas fa-tags"></i> Category</th>
                    <th><i class="fas fa-dollar-sign"></i> Price</th>
                    <th><i class="fas fa-cogs"></i> Action</th>
                </tr>
            </thead>
            <tbody id="productTableBody">
                <tr>
                    <td><img src="/path/to/image.jpg" alt="Product" class="img-thumbnail" style="width: 80px;"></td>
                    <td>Smartphone</td>
                    <td>Electronics</td>
                    <td>$699</td>
                    <td class="text-center">
                        <button class="btn btn-info btn-sm" onclick="viewProductDetails()">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="deleteProduct()">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                <!-- Add more product rows here -->
            </tbody>
        </table>
    </div>
</div>

<!-- Add Product Modal -->
<div id="addProductModal" class="modal" style="display:none;">
    <div class="modal-content p-4">
        <h4 class="mb-3"><i class="fas fa-plus-circle"></i> Add Product</h4>
        <form>
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
            <button type="button" class="btn btn-success" onclick="addProduct()">
                <i class="fas fa-check"></i> Add Product
            </button>
            <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
        </form>
    </div>
</div>

<script>
    // JavaScript functions for managing products
    function searchProduct(query) {
        console.log(`Searching for: ${query}`);
    }

    function filterCategory(category) {
        console.log(`Filtering by category: ${category}`);
    }

    function openAddProductModal() {
        document.getElementById('addProductModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('addProductModal').style.display = 'none';
    }

    function addProduct() {
        alert('Product added!');
        closeModal();
    }

    function deleteProduct() {
        alert('Product deleted!');
    }

    function viewProductDetails() {
        alert('View product details.');
    }
</script>

<style>
    /* Styling for the modal */
    .modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        background: rgba(0, 0, 0, 0.5);
        width: 60%;
        padding: 20px;
    }

    .modal-content {
        background-color: white;
        border-radius: 8px;
        padding: 20px;
    }

    .modal button {
        margin-top: 10px;
    }
</style>
@endsection
