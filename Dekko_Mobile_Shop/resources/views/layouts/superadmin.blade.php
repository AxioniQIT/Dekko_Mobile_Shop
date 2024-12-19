<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Super Admin Dashboard' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/SuperAdmin/superadmin-dashboard.css') }}">
    <style>

    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h4>Super Admin</h4>
                <p class="text-muted">Manage the entire system</p>
            </div>
            <a href="#">Dashboard</a>
            <a href="#">Users</a>
            <a href="#">Products</a>
            <a href="#">Repairs</a>
            <a href="#">Sales</a>
            <a href="#">System Logs</a>
            <a href="#">Settings</a>
            <div class="sidebar-footer">
                <p>© 2024 Mobile Shop</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content w-100" id="mainContent">
            <nav class="navbar navbar-expand navbar-light">
                <div class="container-fluid">
                    <button class="toggle-btn me-3" id="sidebarToggle">☰</button>
                    <span class="navbar-brand mb-0 h1">Dashboard</span>
                    <div class="ms-auto">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="container mt-4">
                <h2>Welcome, Super Admin!</h2>
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5>Users</h5>
                                <p>120 Active</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5>Products</h5>
                                <p>350 Items</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5>Sales</h5>
                                <p>$12,000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5>Repairs</h5>
                                <p>45 Pending</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Custom Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/SuperAdmin/dashboard.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
