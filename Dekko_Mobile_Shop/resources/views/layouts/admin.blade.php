<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="stylesheet" href="{{ asset('css/Admin/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('css/Admin/dashboard.css') }}">

</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h4>Admin</h4>
                <p class="text-muted">Manage the entire system</p>
            </div>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.product') }}">Products</a>
            <a href="{{ route('admin.spareparts') }}">Spare Parts</a>
            <a href="{{ route('admin.repairs') }}">Repairs</a>
            <a href="{{ route('admin.employees') }}">Employees</a>
            <a href="{{ route('admin.customers') }}">Customers</a>
            <a href="{{ route('admin.orderhistory') }}">Order History</a>
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
                @yield('content')
            </div>
        </div>
    </div>
    <div id="commanModel" class="modal fade" tabindex="-1" aria-labelledby="modelCommanModelLabel"
        style="display: none;">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelCommanModelLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>


    <div id="commanModelOver" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modelCommanModelLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelCommanModelLabel"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Custom Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/Admin/dashboard.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>


</body>

</html>
