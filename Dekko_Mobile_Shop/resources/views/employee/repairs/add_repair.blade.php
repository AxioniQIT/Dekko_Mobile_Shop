@extends('layouts.employee')

@section('content')
<style>
    /* Custom Styles for Repair Management */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: 30px auto;
        padding: 20px;
        background-color: #f0f8ff;

    }

    h3, h5 {
        font-size: 1.6rem;
        color: #2c3e50;
        text-align: center;
        font-weight: bold;

    }
    h2{
        color: #ffffff;
        font-size: 1.6rem;
        text-align: center;
        font-weight: bold;
    }

    .repair-form, .cost-summary, .repair-entry {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        background-color: #fff;
        padding: 25px;
        margin-bottom: 30px;
    }

    .repair-form-second {
    background-color: #0822E3FF; /* Existing background color */
    color: #ffffff; /* Change this to your preferred text color */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 25px;
    margin-bottom: 30px;
}


    .form-label {
        font-weight: 600;
        color: #34495e;
    }

    .form-control, .form-select {
        border-radius: 8px;
        padding: 12px;
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .btn {
        border-radius: 10px;
        padding: 12px 25px;
        font-size: 1.1rem;
        text-transform: uppercase;
        transition: all 0.3s;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .btn-primary {
        background-color: #3498db;
        border: none;
        color: white;
    }

    .btn-success {
        background-color: #2ecc71;
        border: none;
        color: white;
    }

    .btn-danger {
        background-color: #e74c3c;
        border: none;
        color: white;
    }

    .cost-summary ul {
        list-style-type: none;
        padding: 0;
    }

    .cost-summary ul li {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-size: 1.3rem;
    }

    .cost-summary ul li span {
        font-weight: 600;
    }

    .table {
        width: 100%;
        margin-bottom: 30px;
        border-collapse: collapse;
    }

    .table th, .table td {
        text-align: left;
        padding: 12px;
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #ecf0f1;
        color: #2c3e50;
    }

    .table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table td input[type="number"] {
        width: 70px;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    @media (max-width: 768px) {
        .row {
            flex-direction: column;
        }

        .col-md-6 {
            width: 100%;
            margin-bottom: 15px;
        }

        .btn {
            width: 100%;
            margin-bottom: 10px;
        }

        .repair-entry {
            padding: 15px;
        }

        .cost-summary ul li {
            flex-direction: column;
            align-items: flex-start;
        }

        .cost-summary ul li span {
            margin-bottom: 5px;
        }
    }
</style>
<div class="repair-form-second">
        <h2>Add Repair Details</h2>
    </div>

<div class="container">


    <!-- Customer Info Form -->
    <div class="repair-form">
        <form>
            <div class="row">
                <div class="col-md-6">
                    <label for="customerName" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="customerName" placeholder="Enter customer name">
                </div>

                <div class="col-md-6">
                    <label for="customerContact" class="form-label">Customer Contact</label>
                    <input type="text" class="form-control" id="customerContact" placeholder="Enter contact number">
                </div>
            </div>
        </form>
    </div>

    <!-- Repair History Section -->
    <div class="repair-history">
        <h5>Multiple Repair Options</h5>

        <div id="repairHistoryContainer">
            <div class="repair-entry">
                <div class="text-end">
                    <button type="button" class="btn btn-danger btn-remove">Remove this Repair</button>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="deviceDetails" class="form-label">Device Details</label>
                        <textarea class="form-control" id="deviceDetails" rows="3" placeholder="Enter device details"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="issueDescription" class="form-label">Issue Description</label>
                        <textarea class="form-control" id="issueDescription" rows="3" placeholder="Enter issue description"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="estimatedCost" class="form-label">Estimated Cost</label>
                        <input type="number" class="form-control" id="estimatedCost" placeholder="Enter estimated cost">
                    </div>

                    <div class="col-md-6">
                        <label for="repairStatus" class="form-label">Repair Status</label>
                        <select class="form-select" id="repairStatus">
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>

                <!-- Spare Parts Section -->
                <h5>Select Spare Parts</h5>
                <div class="table-wrapper">
                    <table class="table">
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
                                <td><input type="checkbox"></td>
                                <td>Apple</td>
                                <td>iPhone 13 Pro Max</td>
                                <td>Screen</td>
                                <td>$60.00</td>
                                <td>25</td>
                                <td><input type="number" class="form-control" min="1" max="25" value="1"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>Apple</td>
                                <td>iPhone 13 Pro Max</td>
                                <td>Battery</td>
                                <td>$50.00</td>
                                <td>15</td>
                                <td><input type="number" class="form-control" min="1" max="15" value="1"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Button to Add Another Repair -->
        <div class="text-end mt-3">
            <button type="button" class="btn btn-primary add-repair">Add Another Repair</button>
        </div>
    </div>

    <!-- Cost Summary -->
    <div class="cost-summary">
        <h3>Cost Summary</h3>

        <ul>
            <li><span>Repair Cost:</span> $150.00</li>
            <li><span>Spare Parts Total:</span> $130.00</li>
            <li><span>Total Cost:</span> $280.00</li>
        </ul>

        <div class="text-end">
            <button type="submit" class="btn btn-success">Save Repair</button>
        </div>
    </div>
</div>

<script>
    document.querySelector('.add-repair').addEventListener('click', function() {
        var newRepair = document.querySelector('.repair-entry').cloneNode(true);
        document.getElementById('repairHistoryContainer').appendChild(newRepair);
    });

    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('btn-remove')) {
            e.target.closest('.repair-entry').remove();
        }
    });
</script>
@endsection
