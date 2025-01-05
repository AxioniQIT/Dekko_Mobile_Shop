@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <h4 class="text-center mb-4">Repair Updates for Repair ID: <span class="text-primary">R12345</span></h4>

    <!-- Responsive Table for Updates -->
    <div class="table-responsive shadow-sm rounded bg-white p-3">
        <table class="table table-striped align-middle">
            <thead class="table-primary">
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
    <form class="mt-4 shadow-sm p-4 bg-white rounded">
        <h5 class="text-primary text-center mb-3">Add Update</h5>
        <div class="mb-3">
            <label for="update_description" class="form-label">Update Description</label>
            <textarea class="form-control" id="update_description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-info w-100">Add Update</button>
    </form>

    <!-- Repair Entry Form -->
    <div class="repair-form shadow-sm mt-5 p-4 bg-white rounded">
        <h3>Edit Repair Details</h3>
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
    <div class="repair-form shadow-sm mt-5 p-4 bg-white rounded">
        <h3>Select Spare Parts</h3>
        <div class="row">
            <div class="col-md-6 col-12 mb-3">
                <label for="brandSelection" class="form-label">Brand</label>
                <select class="form-select" id="brandSelection">
                    <option selected>Apple</option>
                    <option>Samsung</option>
                    <option>OnePlus</option>
                </select>
            </div>
            <div class="col-md-6 col-12 mb-3">
                <label for="modelSelection" class="form-label">Model</label>
                <select class="form-select" id="modelSelection">
                    <option selected>iPhone 13 Pro Max</option>
                    <option>iPhone 12</option>
                    <option>iPhone 11</option>
                </select>
            </div>
        </div>
        <div class="table-responsive">
            <h5 class="text-center text-primary">Available Spare Parts for iPhone 13 Pro Max</h5>
            <div class="mb-3">
                <div class="d-flex align-items-center flex-column flex-md-row">
                    <label for="searchInput" class="form-label me-3 mb-2 mb-md-0">Search Spare Parts</label>
                    <input type="text" class="form-control w-100 w-md-auto" id="searchInput" placeholder="Search by part name or price">
                </div>
            </div>
            <table class="table table-bordered align-middle">
                <thead class="table-primary">
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
        <button class="btn btn-success w-100 mt-3">Add Spare Parts</button>
    </div>

    <!-- Cost Summary -->
    <div class="cost-summary shadow-lg rounded p-4 mt-5 mb-4" style="background: linear-gradient(135deg, #ffffff, #f8f9fa); border: 1px solid #e0e0e0;">
        <h3 class="text-center text-primary mb-4"><i class="fas fa-calculator"></i> Cost Summary</h3>
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
            <button type="submit" class="btn btn-success btn-lg">
                <i class="fas fa-save me-2"></i> Save Repair
            </button>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f8f9fa;
    }

    .btn {
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .btn:hover {
        opacity: 0.8;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .repair-form h3, .cost-summary h3 {
        font-size: 1.8rem;
        color: #060AF5FF;
        text-transform: uppercase;
        font-weight: bold;
        letter-spacing: 1px;
        text-align: center;
    }
</style>
@endsection
