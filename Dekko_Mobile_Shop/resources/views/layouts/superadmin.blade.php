<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Super Admin Dashboard' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <link rel="stylesheet" href="{{ asset('css/SuperAdmin/superadmin-dashboard.css') }}">

    <link rel="stylesheet" href="{{ asset('css/Admin/style.css') }}" id="main-style-link">
    {{-- <link rel="stylesheet" href="{{ asset('css/Admin/dashboard.css') }}"> --}}

    <link rel="stylesheet" href="{{ asset('css/Admin/admin_layout.css') }}">
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h4>Admin</h4>
                <p class="text-muted">Manage the entire system</p>
            </div>
            <a href="{{ route('superadmin.dashboard') }}" class="d-flex align-items-center">
                <i class="fas fa-tachometer-alt me-2 text-primary"></i> Dashboard
            </a>
            <a href="{{ route('superadmin.users') }}" class="d-flex align-items-center">
                <i class="fas fa-users me-2 text-danger"></i> Users
            </a>
            <a href="" class="d-flex align-items-center">
                <i class="fas fa-box-open me-2 text-success"></i> Products
            </a>
            <a href="" class="d-flex align-items-center">
                <i class="fas fa-tags me-2 text-info"></i> Brands
            </a>
            <a href="" class="d-flex align-items-center">
                <i class="fas fa-chart-line me-2 text-warning"></i> Sales
            </a>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @endif
        });
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };
    </script>


    <!-- Bootstrap JS and Custom Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/Admin/dashboard.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script src="{{ asset('js/Admin/admin_layout.js') }}"></script>



</body>

</html>
