@extends('layouts.employee')

@section('content')

<style>
    body {
        background-color: #eef2f5;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Sidebar Styles */
    .sidebar {
        width: 250px;
        background: #2c3e50;
        color: #ecf0f1;
        height: 100vh;
        position: fixed;
        transition: transform 0.3s ease-in-out, height 0.3s ease-in-out;
        box-shadow: 4px 0 15px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }

    /* Main Content */
    .main-content {
        margin-left: 250px;
        padding: 20px;
        transition: margin-left 0.3s ease-in-out;
    }

    .main-content h4 {
        color: #34495e;
        text-align: center;
        font-weight: bold;
    }

    /* Table Styling */
    .table th,
    .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Card Styling */
    .card {
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        border: none;
    }

    .card .card-body {
        padding: 20px;
    }

    .card-title {
        font-weight: bold;
        margin-bottom: 20px;
        color: #2c3e50;
    }

    /* Button Styling */
    .btn-sm {
        padding: 0.35rem 0.7rem;
    }

    .btn-info {
        background-color: #3498db;
        border-color: #3498db;
    }

    .btn-danger {
        background-color: #e74c3c;
        border-color: #e74c3c;
    }

    .btn-success {
        background-color: #2ecc71;
        border-color: #2ecc71;
    }

    .btn-warning {
        background-color: #f1c40f;
        border-color: #f1c40f;
    }

    /* Icons */
    .action-icons {
        display: flex;
        gap: 5px;
        justify-content: center;
    }

    .action-icons button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.35rem 0.5rem;
    }

    .add-btn {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 15px;
    }

    .card-body ul {
        list-style-type: none;
        padding-left: 0;
    }
</style>

<div class="container mt-5">
    <!-- Repairs Table Section -->
    <h4 class="mb-4"><i class="fas fa-tools"></i> Repair Records</h4>

    <!-- Add New Repair Button -->
    <div class="add-btn">
        <button class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Add Repair
        </button>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><i class="fas fa-list"></i> Repair Records</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Repair ID</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Device</th>
                        <th scope="col">Issue</th>
                        <th scope="col">Estimated Cost</th>
                        <th scope="col">Spare Parts</th>
                        <th scope="col">Full Cost</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dummy Data -->
                    <tr>
                        <td>R001</td>
                        <td>John Doe</td>
                        <td>Samsung Galaxy S21</td>
                        <td>Screen Cracked</td>
                        <td>$200.00</td>
                        <td>
                            <ul>
                                <li>Screen - $100</li>
                                <li>Battery - $50</li>
                            </ul>
                        </td>
                        <td>$350.00</td>
                        <td><span class="badge bg-warning">In Progress</span></td>
                        <td>
                            <div class="action-icons">
                                <button class="btn btn-info btn-sm" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>R002</td>
                        <td>Jane Smith</td>
                        <td>iPhone 13</td>
                        <td>Charging Port Issue</td>
                        <td>$150.00</td>
                        <td>
                            <ul>
                                <li>Charging Port - $80</li>
                                <li>USB Cable - $20</li>
                            </ul>
                        </td>
                        <td>$250.00</td>
                        <td><span class="badge bg-warning">In Progress</span></td>
                        <td>
                            <div class="action-icons">
                                <button class="btn btn-info btn-sm" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
