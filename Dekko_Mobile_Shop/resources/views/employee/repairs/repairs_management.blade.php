@extends('layouts.employee')

@section('content')
<style>
    /* General Styles */
    .repair-form, .cost-summary {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 30px;
        border-radius: 8px;
        background: linear-gradient(135deg, #ffffff, #f7f9fc);
    }

    .repair-form-second {
    background-color: #0031F4FF; /* Existing background color */
    color: #ffffff; /* Change this to your preferred text color */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 25px;
    margin-bottom: 30px;
}

h2{
        color: #ffffff;
        font-size: 1.6rem;
        text-align: center;
        font-weight: bold;
    }

    .repair-form h3, .cost-summary h3 {
        font-size: 1.5rem;
        color: #34495e;
        margin-bottom: 20px;
        text-align: center;
        font-weight: bold;
    }

    .form-control, .form-select {
        margin-bottom: 15px;
        box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .btn {
        transition: all 0.3s ease;
        padding: 10px 20px;
        font-size: 1rem;
    }

    .btn-success {
        background: #16a085;
        border: none;
        color: #fff;
    }

    .btn-success:hover {
        transform: translateY(-2px);
        background: #13876c;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .btn:active {
        transform: scale(0.98);
    }

    .table-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .table {
        margin-top: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        width: 100%;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .cost-summary .list-group-item {
        font-size: 1.1rem;
        padding: 12px;
        border: none;
    }

    .cost-summary .list-group-item + .list-group-item {
        border-top: 1px solid #ddd;
    }

    .cost-summary .total-cost {
        font-size: 1.3rem;
        font-weight: bold;
        color: #16a085;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .row > [class*="col-"] {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .btn {
            width: 100%;
            margin-bottom: 10px;
        }

        .table th, .table td {
            font-size: 0.75rem;
            padding: 8px;
        }

        table {
            font-size: 0.85rem;
        }

        .cost-summary .list-group-item {
            font-size: 0.95rem;
        }

        .repair-form, .cost-summary {
            padding: 15px;
        }

        .repair-form h3, .cost-summary h3 {
            font-size: 1.25rem;
        }

        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    }

    @media (max-width: 576px) {
        .repair-form h3, .cost-summary h3 {
            font-size: 1.1rem;
        }

        .btn {
            font-size: 0.9rem;
        }

        .table th, .table td {
            font-size: 0.7rem;
        }

        .cost-summary .list-group-item {
            font-size: 0.85rem;
        }

        .repair-form {
            padding: 10px;
        }
    }
</style>

<div class="container mt-5">
    <!-- Repair Entry Form -->
    <div class="repair-form-second">
        <h2>Edit Repair Details</h2>
    </div>

    <!-- Spare Parts Selection -->
    <div class="repair-form">
        <h2>Select Spare Parts</h2>
        <div class="row">
            <!-- Form fields here -->
        </div>

        <h5 class="mt-3 text-center text-primary">Available Spare Parts</h5>
        <div class="mb-3 d-flex align-items-center">
            <label for="searchInput" class="form-label me-3">Search Spare Parts</label>
            <input type="text" class="form-control" id="searchInput" placeholder="Search by part name or price" style="max-width: 400px;">
        </div>

        <!-- Table Wrapper for Responsive Scrolling -->
        <div class="table-wrapper">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Part Name</th>
                        <th>Price</th>
                        <th>Stock Quantity</th>
                        <th>Quantity</th>
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
                </tbody>
            </table>
        </div>

        <button class="btn btn-success mt-3">Add Spare Parts</button>
    </div>

    <!-- Cost Summary -->
    <div class="cost-summary">
        <h3><i class="fas fa-calculator"></i> Cost Summary</h3>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Repair Cost:</span>
                <span>$150.00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Spare Parts Total:</span>
                <span>$130.00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Total Cost:</span>
                <span class="total-cost">$280.00</span>
            </li>
        </ul>

        <div class="text-end mt-4">
            <button class="btn btn-success">Save Repair</button>
        </div>
    </div>
</div>
@endsection
