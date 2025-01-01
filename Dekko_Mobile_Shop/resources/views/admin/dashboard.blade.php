@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-4">
    <!-- Dashboard Header -->
    <div class="text-center mb-4">
        <h1 class="fw-bold"><i class="fas fa-tachometer-alt me-2"></i> Admin Dashboard</h1>
        <p class="text-muted">Welcome to your admin panel, manage all aspects of your system.</p>
    </div>

    <!-- Widgets Section -->
    <div class="row mb-4 text-center">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
            <div class="card shadow-sm bg-primary text-white p-4">
                <i class="fas fa-users fa-3x mb-3"></i>
                <h5>Total Users</h5>
                <h3>120 Active</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
            <div class="card shadow-sm bg-success text-white p-4">
                <i class="fas fa-box-open fa-3x mb-3"></i>
                <h5>Total Products</h5>
                <h3>350 Items</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
            <div class="card shadow-sm bg-warning text-dark p-4">
                <i class="fas fa-chart-line fa-3x mb-3"></i>
                <h5>Total Sales</h5>
                <h3>$12,000</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card shadow-sm bg-danger text-white p-4">
                <i class="fas fa-tools fa-3x mb-3"></i>
                <h5>Pending Repairs</h5>
                <h3>45</h3>
            </div>
        </div>
    </div>
{{--
    <!-- Stats & Actions -->
    <div class="row mb-4">
        <div class="col-lg-6 col-md-12 mb-3">
            <div class="card shadow-sm p-4">
                <h5 class="fw-bold mb-3"><i class="fas fa-users-cog me-2"></i> User Management</h5>
                <p>Manage users and their roles in the system.</p>
                <button class="btn btn-outline-primary w-100" onclick="window.location.href='/employee'">
                    <i class="fas fa-cogs"></i> Manage Users
                </button>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-sm p-4">
                <h5 class="fw-bold mb-3"><i class="fas fa-boxes me-2"></i> Inventory Management</h5>
                <p>Track products, inventory levels, and categories.</p>
                <button class="btn btn-outline-success w-100" onclick="window.location.href='/products'">
                    <i class="fas fa-box"></i> Manage Products
                </button>
            </div>
        </div>
    </div>
--}}
    <!-- Recent Activity -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5><i class="fas fa-bell"></i> Recent Activity</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <i class="fas fa-user-plus me-2"></i> New User Registered: <strong>Jane Doe</strong>
                        <span class="text-muted float-end">Just Now</span>
                    </li>
                    <li class="list-group-item">
                        <i class="fas fa-box me-2"></i> New Product Added: <strong>Bluetooth Speaker</strong>
                        <span class="text-muted float-end">2 hours ago</span>
                    </li>
                    <li class="list-group-item">
                        <i class="fas fa-credit-card me-2"></i> New Sale: <strong>Order #4554</strong> - $250
                        <span class="text-muted float-end">5 hours ago</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    /* Add custom spacing for smaller screens */
    @media (max-width: 576px) {
        .card h5 {
            font-size: 1rem;
        }

        .card h3 {
            font-size: 1.25rem;
        }

        .card i {
            font-size: 2rem;
        }

        .btn {
            font-size: 0.9rem;
        }
    }
</style>
@endsection
