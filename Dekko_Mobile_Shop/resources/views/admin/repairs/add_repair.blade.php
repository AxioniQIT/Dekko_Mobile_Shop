@extends('layouts.admin')

@section('content')
<style>
    /* Custom Styles for Repair Management */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f6f9;
    }

    .repair-form, .cost-summary {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 25px;
        margin-bottom: 30px;
        border-radius: 15px;
        background: #ffffff;
    }

    .repair-form h3, .cost-summary h3 {
        font-size: 1.8rem;
        color: #060AF5FF;
        margin-bottom: 20px;
        text-transform: uppercase;
        font-weight: bold;
        letter-spacing: 1px;
        text-align: center;
    }

    .form-control, .form-select {
        margin-bottom: 15px;
        border-radius: 10px;
        border: 1px solid #ced4da;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #27ae60;
        box-shadow: 0 0 8px rgba(39, 174, 96, 0.5);
    }

    .cost-summary .list-group-item {
        font-size: 1.2rem;
        padding: 15px;
        background: #f9f9f9;
        border: none;
        border-bottom: 1px solid #e8e8e8;
    }

    .cost-summary .total-cost {
        font-size: 1.4rem;
        font-weight: bold;
        color: #27ae60;
    }

    .btn {
        transition: all 0.3s ease-in-out;
        font-size: 1rem;
        padding: 10px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: #3498db;
        border-color: #3498db;
    }

    .btn-primary:hover {
        background-color: #2980b9;
    }

    .btn-success {
        background-color: #27ae60;
        border-color: #27ae60;
    }

    .btn-success:hover {
        background-color: #229954;
    }

    .btn-danger {
        background-color: #e74c3c;
        border-color: #e74c3c;
    }

    .btn-danger:hover {
        background-color: #c0392b;
    }

    /* Table Styles */
    .table {
        margin-top: 20px;
        border: 1px solid #ddd;
    }

    .table th {
        background: #ecf0f1;
        font-weight: bold;
        text-transform: uppercase;
        color: #2c3e50;
    }

    .table td, .table th {
        text-align: center;
        vertical-align: middle;
        padding: 15px;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    /* Search Input */
    #searchInput {
        max-width: 400px;
        border: 2px solid #ddd;
        border-radius: 30px;
        padding: 10px 15px;
    }

    #searchInput:focus {
        border-color: #27ae60;
        box-shadow: 0 0 8px rgba(39, 174, 96, 0.5);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .repair-form, .cost-summary {
            padding: 20px;
        }

        .form-control, .form-select {
            font-size: 0.9rem;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .cost-summary ul {
            font-size: 0.9rem;
        }
    }
</style>

<div class="container mt-5">
    <!-- Repair Entry Form -->
    <div class="repair-form">
        <h3>Add Repair Details</h3>
        <form>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="customerName" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="customerName" value="John Doe">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="customerContact" class="form-label">Customer Contact</label>
                    <input type="text" class="form-control" id="customerContact" value="0123456789">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="deviceDetails" class="form-label">Device Details</label>
                    <textarea class="form-control" id="deviceDetails" rows="3">iPhone 13 Pro Max</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="issueDescription" class="form-label">Issue Description</label>
                    <textarea class="form-control" id="issueDescription" rows="3">Cracked screen and battery issues</textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="estimatedCost" class="form-label">Estimated Cost</label>
                    <input type="number" class="form-control" id="estimatedCost" value="150.00">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="repairStatus" class="form-label">Repair Status</label>
                    <select class="form-select" id="repairStatus">
                        <option selected>Pending</option>
                        <option>In Progress</option>
                        <option>Completed</option>
                        <option>Cancelled</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <!-- Spare Parts Selection -->
    <div class="repair-form">
        <h3>Select Spare Parts</h3>
        <div class="row">
            <div class="col-md-6">
                <label for="brandSelection" class="form-label">Brand</label>
                <select class="form-select" id="brandSelection">
                    <option selected>Apple</option>
                    <option>Samsung</option>
                    <option>OnePlus</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="modelSelection" class="form-label">Model</label>
                <select class="form-select" id="modelSelection">
                    <option selected>iPhone 13 Pro Max</option>
                    <option>iPhone 12</option>
                    <option>iPhone 11</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="partSelection" class="form-label">Spare Part</label>
                <select class="form-select" id="partSelection">
                    <option selected>Screen</option>
                    <option>Battery</option>
                    <option>Charging Port</option>
                </select>
            </div>
        </div>

        <h5 class="mt-3 text-center text-primary">Available Spare Parts for iPhone 13 Pro Max</h5>

        <!-- Search Input -->
        <div class="mb-3 d-flex align-items-center">
            <label for="searchInput" class="form-label me-3">Search Spare Parts</label>
            <input type="text" class="form-control" id="searchInput" placeholder="Search by part name or price" style="max-width: 400px;">
        </div>

        <!-- Table of Spare Parts -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="partsTable">
                <thead>
                    <tr>
                        <th scope="col">Select</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">Part Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock Quantity</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>Apple</td>
                        <td>iPhone 13 Pro Max</td>
                        <td>Screen</td>
                        <td>$60.00</td>
                        <td>25</td>
                        <td><input type="number" class="form-control" min="1" max="25" value="1"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>Apple</td>
                        <td>iPhone 13 Pro Max</td>
                        <td>Battery</td>
                        <td>$50.00</td>
                        <td>15</td>
                        <td><input type="number" class="form-control" min="1" max="15" value="1"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td>Apple</td>
                        <td>iPhone 13 Pro Max</td>
                        <td>Charging Port</td>
                        <td>$20.00</td>
                        <td>30</td>
                        <td><input type="number" class="form-control" min="1" max="30" value="1"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button class="btn btn-success mt-3">Add Spare Parts</button>
    </div>

    <!-- Cost Summary -->
    <div class="cost-summary">
        <h3>Cost Summary</h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
                <span class="text-muted">Repair Cost:</span>
                <span class="badge bg-primary text-white py-2 px-3 rounded-pill fs-5">$150.00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
                <span class="text-muted">Spare Parts Total:</span>
                <span class="badge bg-primary text-white py-2 px-3 rounded-pill fs-5">$130.00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
                <span class="fw-bold text-muted">Total Cost:</span>
                <span class="badge bg-success text-white py-2 px-3 rounded-pill fs-5 fw-bold">$280.00</span>
            </li>
        </ul>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success btn-lg d-flex align-items-center justify-content-center px-4 py-2 shadow-sm border-0 rounded-pill transition-all">
                <i class="fas fa-save me-2"></i> <span>Save Repair</span>
            </button>
        </div>
    </div>
</div>

<script>
    // Function to filter table rows based on search input
    document.getElementById('searchInput').addEventListener('input', function() {
        var searchTerm = this.value.toLowerCase();
        var rows = document.querySelectorAll('#partsTable tbody tr');
        rows.forEach(function(row) {
            var partName = row.cells[3].textContent.toLowerCase();
            var price = row.cells[4].textContent.toLowerCase();
            if (partName.includes(searchTerm) || price.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
