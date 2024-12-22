
@extends('layouts.admin')

@section('content')
<style>
    /* Custom Styles for Repair Management */
    .repair-form, .cost-summary {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 30px;
        border-radius: 8px;
    }

    .repair-form h3, .cost-summary h3 {
        font-size: 1.5rem;
        color: #34495e;
        margin-bottom: 20px;
    }

    .form-control, .form-select {
        margin-bottom: 15px;
    }

    .cost-summary .list-group-item {
        font-size: 1.1rem;
        padding: 12px;
    }

    .cost-summary .total-cost {
        font-size: 1.3rem;
        font-weight: bold;
        color: #16a085;
    }
</style>


<div class="container mt-5">
<!-- Repair Entry Form -->
<div class="repair-form">
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
            <label for="modelSelection" class="form-label">Spare Part</label>
            <select class="form-select" id="modelSelection">
                <option selected>Screen</option>
                <option>Battery</option>
                <option>Charging Port</option>

            </select>
        </div>
    </div>

    <h5 class="mt-3 text-center text-primary">Available Spare Parts for iPhone 13 Pro Max</h5>
<br/>
<!-- Search Input -->
<div class="mb-3">
    <div class="mb-3 d-flex align-items-center">
        <label for="searchInput" class="form-label me-3">Search Spare Parts</label>
        <input type="text" class="form-control" id="searchInput" placeholder="Search by part name or price" style="max-width: 400px;">
    </div>
    </div>

<!-- Table of Spare Parts -->
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
            <td>
                <input type="checkbox" class="form-check-input">
            </td>

            <td>Apple</td>
            <td>iPhone 13 Pro Max</td>
            <td>Screen</td>
            <td>$60.00</td>
            <td>25</td>
            <td>
                <input type="number" class="form-control" min="1" max="25" value="1" style="width: 80px;">
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" class="form-check-input">
            </td>

            <td>Apple</td>
            <td>iPhone 13 Pro Max</td>
            <td>Battery</td>
            <td>$50.00</td>
            <td>15</td>
            <td>
                <input type="number" class="form-control" min="1" max="15" value="1" style="width: 80px;">
            </td>
        </tr>
        <tr>
            <td>
                <input type="checkbox" class="form-check-input">
            </td>

            <td>Apple</td>
            <td>iPhone 13 Pro Max</td>
            <td>Charging Port</td>
            <td>$20.00</td>
            <td>30</td>
            <td>
                <input type="number" class="form-control" min="1" max="30" value="1" style="width: 80px;">
            </td>
        </tr>
    </tbody>
</table>

<script>
    // Function to filter table rows based on search input
    document.getElementById('searchInput').addEventListener('input', function() {
        var searchTerm = this.value.toLowerCase(); // Get the search term and convert to lowercase
        var rows = document.querySelectorAll('#partsTable tbody tr'); // Get all table rows
        rows.forEach(function(row) {
            var partName = row.cells[1].textContent.toLowerCase(); // Get part name
            var price = row.cells[2].textContent.toLowerCase(); // Get price
            if (partName.includes(searchTerm) || price.includes(searchTerm)) {
                row.style.display = ''; // Show row if it matches the search term
            } else {
                row.style.display = 'none'; // Hide row if it doesn't match the search term
            }
        });
    });
</script>

    <button class="btn btn-success mt-3">Add Spare Parts</button>
</div>

<!-- Cost Summary -->
<div class="cost-summary shadow-lg rounded p-4 mb-4" style="background: linear-gradient(135deg, #ffffff, #f8f9fa); border: 1px solid #e0e0e0;">
    <h3 class="text-center text-primary mb-4"><i class="fas fa-calculator"></i> Cost Summary</h3>

    <!-- Cost Details List -->
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

    <!-- Save Button -->
    <div class="text-end mt-4">
        <button type="submit" class="btn btn-success btn-lg d-flex align-items-center justify-content-center px-4 py-2 shadow-sm border-0 rounded-pill transition-all hover:bg-green-600 focus:outline-none">
            <i class="fas fa-save me-2"></i> <span>Save Repair</span>
        </button>
    </div>
</div>


<div>

</div>
</div>
@endsection
