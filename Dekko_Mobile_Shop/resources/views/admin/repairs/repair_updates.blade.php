@extends('layouts.admin')

@section('styles')
<style>
    /* Custom styling for the page */
    .container-fluid {
        background-color: #f9f9f9;
    }

    .card {
        border-radius: 8px;
    }

    .card-body {
        padding: 1.5rem;
    }

    .table-responsive {
        margin-top: 20px;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .form-label {
        font-weight: bold;
    }

    /* Styling for the search input */
    #searchInput {
        width: 100%;
        margin-top: 10px;
    }

    /* Styling for Cost Summary */
    .list-group-item {
        font-size: 1.1rem;
    }

    .badge {
        font-size: 1.2rem;
    }

    /* Style for Update Table */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f2f2f2;
    }

    /* Form and Button Styling */
    .btn {
        padding: 10px 20px;
        font-size: 1.1rem;
    }

    .table-responsive {
        margin-top: 15px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid px-4">
    <h4 class="text-center my-4">Repair Updates for Repair ID: R12345</h4>

    <!-- Repair Updates Table -->
    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Update ID</th>
                            <th scope="col">Update Description</th>
                            <th scope="col">Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>U123</td>
                            <td>Device received for diagnosis</td>
                            <td>2024-12-21 10:30 AM</td>
                        </tr>
                        <tr>
                            <td>U124</td>
                            <td>Issue diagnosed as faulty battery and motherboard</td>
                            <td>2024-12-21 12:00 PM</td>
                        </tr>
                        <tr>
                            <td>U125</td>
                            <td>Parts ordered and repair started</td>
                            <td>2024-12-21 02:30 PM</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Add Update Form -->
            <form class="mt-4">
                <div class="mb-3">
                    <label for="update_description" class="form-label">Add Update</label>
                    <textarea class="form-control" id="update_description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-info w-100">Add Update</button>
            </form>
        </div>
    </div>

    <!-- Repair Entry Form -->
    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <h5>Edit Repair Details</h5>
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
    </div>

    <!-- Spare Parts Selection -->
    <div class="card shadow-lg mb-4">
        <div class="card-body">
            <h5>Select Spare Parts</h5>
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

            <!-- Search Spare Parts -->
            <div class="mb-3 mt-3">
                <div class="d-flex align-items-center">
                    <label for="searchInput" class="form-label me-3">Search Spare Parts</label>
                    <input type="text" class="form-control" id="searchInput" placeholder="Search by part name or price" style="max-width: 400px;">
                </div>
            </div>

            <!-- Table of Spare Parts -->
            <div class="table-responsive">
                <table class="table table-bordered" id="partsTable">
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
                            <td><input type="number" class="form-control" min="1" max="25" value="1" style="width: 80px;"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td>Apple</td>
                            <td>iPhone 13 Pro Max</td>
                            <td>Battery</td>
                            <td>$50.00</td>
                            <td>15</td>
                            <td><input type="number" class="form-control" min="1" max="15" value="1" style="width: 80px;"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input"></td>
                            <td>Apple</td>
                            <td>iPhone 13 Pro Max</td>
                            <td>Charging Port</td>
                            <td>$20.00</td>
                            <td>30</td>
                            <td><input type="number" class="form-control" min="1" max="30" value="1" style="width: 80px;"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Cost Summary -->
            <div class="list-group mt-4">
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
                    Estimated Repair Cost
                    <span class="badge bg-info">150.00</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
                    Spare Parts Cost
                    <span class="badge bg-success">80.00</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
                    Total Cost
                    <span class="badge bg-danger">230.00</span>
                </a>
            </div>

            <!-- Submit Button -->
            <button class="btn btn-success mt-3 w-100">Save Repair Update</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Add your JavaScript or jQuery functionality if necessary
</script>
@endsection
