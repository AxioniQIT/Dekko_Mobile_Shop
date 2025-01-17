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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/Admin/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('css/Admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin/admin_layout.css') }}">

    <style>
        /* Make repairs menu scrollable */
        .repairs-submenu {
            max-height: 300px; /* Adjust based on your content */
            overflow-y: auto;
        }

        /* Custom style for sidebar collapse */
        .sidebar.collapse {
            display: none;
        }

        /* Optional: Add animation for smooth sidebar transition */
        .sidebar {
            transition: all 0.3s ease;
        }
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
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center">
                <i class="fas fa-tachometer-alt me-2 text-primary"></i> Dashboard
            </a>

            <!-- ........................................ -->

            <a href="{{ route('pos.product') }}" class="d-flex align-items-center">
                <i class="fas fa-box-open me-2 text-success"></i> Pos-Product
            </a>

            <!-- ........................................ -->


            <a href="{{ route('admin.product') }}" class="d-flex align-items-center">
                <i class="fas fa-box-open me-2 text-success"></i> Products
            </a>

            <a href="{{ route('admin.brands') }}" class="d-flex align-items-center">
                <i class="fas fa-tags me-2 text-info"></i> Brands
            </a>

            <a href="{{ route('admin.spareparts') }}" class="d-flex align-items-center">
                <i class="fas fa-cogs me-2 text-warning"></i> Spare Parts
            </a>

            <a href="{{ route('admin.repairs.posRepair') }}" class="d-flex align-items-center">
                <i class="fas fa-cogs me-2 text-warning"></i> POS-Repair
            </a>

            <div class="repairs-menu">
                <a href="#" id="repairsMenuToggle" class="menu-link d-flex align-items-center">
                    <i class="fas fa-tools me-2 text-danger"></i> Repairs
                    <span class="ms-auto"><i class="fas fa-chevron-down" id="repairsIcon"></i></span>
                </a>
                <div class="collapse repairs-submenu" id="repairsMenu">
                    <a href="{{ route('admin.repairs.addrepair') }}" class="submenu-link d-flex align-items-center">
                        <i class="fas fa-plus-circle me-2 text-success"></i> Add Repairs
                    </a>

                    <a href="{{ route('admin.repairs.management') }}" class="submenu-link d-flex align-items-center">
                        <i class="fas fa-cogs me-2 text-primary"></i> Repairs Management
                    </a>

                    <a href="{{ route('admin.repairs.repairUpdates') }}" class="submenu-link d-flex align-items-center">
                        <i class="fas fa-sync-alt me-2 text-warning"></i> Repairs Updates
                    </a>

                    <a href="{{ route('admin.repairs.inprogressrepairs')}}" class="submenu-link d-flex align-items-center">
                        <i class="fas fa-spinner me-2 text-info"></i> In Progress
                    </a>

                    <a href="{{ route('admin.repairs.pendingrepairs') }}" class="submenu-link d-flex align-items-center">
                        <i class="fas fa-hourglass-half me-2 text-warning"></i> Pending
                    </a>
                    <a href="{{ route('admin.repairs.completedrepairs') }}" class="submenu-link d-flex align-items-center">
                        <i class="fas fa-check-circle me-2 text-success"></i> Completed
                    </a>
                    <a href="{{ route('admin.repairs.cancelledrepairs') }}" class="submenu-link d-flex align-items-center">
                        <i class="fas fa-times-circle me-2 text-danger"></i> Cancelled
                    </a>
                </div>
            </div>

            <a href="{{ route('admin.repairs.posRepair') }}" class="d-flex align-items-center">
                <i class="fas fa-cogs me-2 text-warning"></i> POS - Repair
            </a>
            <a href="{{ route('admin.employees') }}" class="d-flex align-items-center">
                <i class="fas fa-user-tie me-2 text-info"></i> Employees
            </a>
            <a href="{{ route('admin.customers') }}" class="d-flex align-items-center">
                <i class="fas fa-users me-2 text-purple"></i> Customers
            </a>
            <a href="{{ route('admin.orderhistory') }}" class="d-flex align-items-center">
                <i class="fas fa-history me-2 text-muted"></i> Order History
            </a>
            <div class="sidebar-footer">
                <p>© 2024 Mobile Shop</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content w-100" id="mainContent">
            <nav class="navbar navbar-expand navbar-light">
                <div class="container-fluid">
                    <button class="toggle-btn me-3" id="sidebarToggle" onclick="toggleSidebar()">☰</button>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const repairsMenuToggle = document.getElementById('repairsMenuToggle');
            const repairsMenu = document.getElementById('repairsMenu');
            const icon = document.getElementById('repairsIcon');
            const allMenus = document.querySelectorAll('.collapse');

            repairsMenuToggle.addEventListener('click', function () {
                // Close all other open menus
                allMenus.forEach(function(menu) {
                    if (menu !== repairsMenu) {
                        menu.classList.add('collapse');
                    }
                });

                // Toggle the current menu
                repairsMenu.classList.toggle('collapse');

                // Toggle the icon (chevron down/up)
                if (repairsMenu.classList.contains('collapse')) {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                } else {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                }
            });

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/Admin/dashboard.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/Admin/admin_layout.js') }}"></script>
</body>

</html>
