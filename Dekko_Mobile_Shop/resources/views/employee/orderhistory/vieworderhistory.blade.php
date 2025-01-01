@extends('layouts.employee')

@section('title', 'Order History')

@section('content')
<div class="container mt-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Order History</h2>
        <div class="user-info">
            <i class="fas fa-user"></i> Admin
        </div>
    </div>

    <!-- Tabs -->
    <div class="d-flex mb-3">
        <button class="btn btn-primary me-2 tab-btn active" onclick="showTab('product-history')">Product Sell History</button>
        <button class="btn btn-secondary tab-btn" onclick="showTab('repair-history')">Repair Sell History</button>
    </div>

    <!-- Product Sell History Table -->
    <div id="product-history" class="tab-content">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Invoice No</th>
                    <th>Customer Name</th>
                    <th>Item Name</th>
                    <th>Invoice Date</th>
                    <th>Grand Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0001</td>
                    <td>Customer 1</td>
                    <td>MacBook Air</td>
                    <td>2024-05-11</td>
                    <td>450,000.00</td>
                    <td><button class="btn btn-primary">View</button></td>
                </tr>
                <tr>
                    <td>0002</td>
                    <td>Customer 2</td>
                    <td>Samsung S24</td>
                    <td>2024-05-11</td>
                    <td>350,000.00</td>
                    <td><button class="btn btn-primary">View</button></td>
                </tr>
                <tr>
                    <td>0003</td>
                    <td>Customer 3</td>
                    <td>AirPods Pro</td>
                    <td>2024-05-11</td>
                    <td>150,000.00</td>
                    <td><button class="btn btn-primary">View</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Repair Sell History Table -->
    <div id="repair-history" class="tab-content d-none">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Invoice No</th>
                    <th>Customer Name</th>
                    <th>Repair Details</th>
                    <th>Invoice Date</th>
                    <th>Grand Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0004</td>
                    <td>Customer 4</td>
                    <td>Screen Replacement</td>
                    <td>2024-05-12</td>
                    <td>50,000.00</td>
                    <td><button class="btn btn-primary">View</button></td>
                </tr>
                <tr>
                    <td>0005</td>
                    <td>Customer 5</td>
                    <td>Battery Replacement</td>
                    <td>2024-05-13</td>
                    <td>20,000.00</td>
                    <td><button class="btn btn-primary">View</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Inline JavaScript -->
<script>
    function showTab(tabId) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(content => content.classList.add('d-none'));
        // Remove active class from all buttons
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
        // Show selected tab content and add active class to the button
        document.getElementById(tabId).classList.remove('d-none');
        event.target.classList.add('active');
    }
</script>
@endsection
