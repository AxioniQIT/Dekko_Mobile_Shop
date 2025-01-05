@extends('layouts.admin')

@section('title', 'Seller Sales')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="text-center mb-4">
        <h1 class="fw-bold text-dark"><i class="fas fa-store me-2"></i> POS Product Dashboard</h1>
        <p class="text-muted">Manage your product sales effectively</p>
    </div>

    <!-- Dark Mode Button
    <button id="dark-mode-toggle" class="dark-mode-btn btn btn-outline-dark rounded-circle">
        <i class="fas fa-moon"></i>
    </button> -->

    <!-- Filters -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center w-100 w-sm-auto">
            <input type="text" class="form-control mb-2 mb-sm-0 search-bar" id="search" placeholder="Search">
            <input type="text" class="form-control mb-2 mb-sm-0 search-bar ms-2" id="category" placeholder="Category">
            <button class="btn btn-info ms-2">
                <i class="fas fa-search me-2"></i> Search
            </button>
        </div>
    </div>

    <!-- Flexbox Container for Product Table and Final Bill Section -->
    <div class="d-flex flex-wrap gap-4 justify-content-between">
        <!-- Product Table -->
        <div class="flex-column shadow-lg p-3 mb-4 bg-light rounded" style="flex: 1 1 100%; max-width: 48%;">
            <div class="bg-primary text-white text-center p-3 rounded-top">
                <h5 class="mb-0"><i class="fas fa-table me-2"></i> Product List</h5>
            </div>
            <div class="p-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle table-striped">
                        <thead class="table-light text-center">
                            <tr>
                                <th>Name</th>
                                <th>Stock</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mac Book Air</td>
                                <td>10</td>
                                <td>Laptop</td>
                                <td>150,000.00</td>
                                <td>2</td>
                                <td>300,000.00</td>
                                <td class="text-center">
                                    <button class="btn btn-outline-success btn-sm">Add</button>
                                </td>
                            </tr>
                            <!-- Additional rows here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Final Bill Section -->
        <div class="flex-column shadow-lg p-3 mb-4 bg-light rounded" style="flex: 1 1 100%; max-width: 48%;">
            <div class="bg-success text-white text-center p-3 rounded-top">
                <h5 class="mb-0"><i class="fas fa-file-invoice-dollar me-2"></i> Final Bill</h5>
            </div>
            <div class="p-4">
                <form>
                    <div class="mb-3">
                        <label for="customer-name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="customer-name" placeholder="Customer Name">
                    </div>
                    <div class="mb-3">
                        <label for="phone-number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone-number" placeholder="Phone Number">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Address">
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Color</th>
                                    <th>Discount</th>
                                    <th>New Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mac Book Air</td>
                                    <td>150,000</td>
                                    <td>2</td>
                                    <td>Silver</td>
                                    <td>5,000</td>
                                    <td>295,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
<br><br>
                    <div class="d-flex justify-content-between">
                        <p><strong>Total:</strong> 300,000</p>
                        <p><strong>Discount:</strong> 5,000</p>
                        <p><strong>Final Total:</strong> 295,000</p>
                    </div>
<br>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary">Confirm</button>
                        <button type="button" class="btn btn-success">Print</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script src="{{ asset('js/Pos/product_pos.js') }}"></script>
@endsection

@endsection

<style>
    /* Global Styles */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }

    h1, h5 {
        font-weight: 600;
    }

    .container {
        max-width: 1200px;
        margin: auto;
    }

    .form-control {
        border-radius: 30px;
        padding: 0.75rem;
    }

    .search-bar {
        max-width: 250px;
    }

    .shadow-lg {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .dark-mode-btn {
        position: fixed;
        top: 100px;
        right: 20px;
        background-color: #343a40;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 50%;
        font-size: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .dark-mode-btn:hover {
        background-color: #6c757d;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .btn {
        border-radius: 25px;
        padding: 10px 20px;
        font-size: 14px;
    }

    .btn-outline-success {
        color: #28a745;
        border-color: #28a745;
    }

    .btn-outline-success:hover {
        background-color: #28a745;
        color: white;
    }

    .btn-info {
        border-radius: 25px;
        padding: 8px 16px;
    }

    .rounded-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .rounded-bottom {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .d-flex {
            flex-direction: column;
        }

        .flex-column {
            flex: 1 1 100%;
            max-width: 100%;
        }

        .search-bar {
            max-width: 180px;
            margin-bottom: 10px;
        }

        .dark-mode-btn {
            top: 15px;
            right: 15px;
            font-size: 18px;
        }

        .btn {
            font-size: 12px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table th, .table td {
            padding: 0.75rem;
        }

        /* Reduce form padding and width on mobile */
        .form-control {
            padding: 0.5rem;
        }

        .w-100 {
            width: 100% !important;
        }
    }

    /* Larger screens: Maintain the flex layout */
    @media (min-width: 769px) {
        .d-flex {
            flex-wrap: nowrap;
        }
    }
</style>
