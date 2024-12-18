<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Admin/dashboard.css') }}">
   <style>

    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h4>Admin</h4>
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
                        <a href="{{ route('logout') }}" class="btn btn-outline-danger">Logout</a>
                    </div>
                </div>
            </nav>
            <div class="container mt-4">
                  @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Custom Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/Admin/dashboard.js') }}"></script>


</body>
</html>
