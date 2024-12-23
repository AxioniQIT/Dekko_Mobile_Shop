@extends('layouts.admin')

@section('title', 'Employee Management')

@section('content')
<div class="container mt-4">
    <!-- Dashboard Header -->
    <div class="text-center mb-4">
        <h1 class="fw-bold"><i class="fas fa-users me-2"></i> Employee Management</h1>
        <p class="text-muted">Manage your employees efficiently and effectively</p>
    </div>

    <!-- Widgets Section -->
    <div class="row mb-4 text-center">
        <div class="col-md-4">
            <div class="card shadow-sm bg-primary text-white p-3">
                <i class="fas fa-users fa-2x mb-2"></i>
                <h5>Total Employees</h5>
                <h3>120</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm bg-success text-white p-3">
                <i class="fas fa-user-shield fa-2x mb-2"></i>
                <h5>Admins</h5>
                <h3>5</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm bg-warning text-dark p-3">
                <i class="fas fa-user-tie fa-2x mb-2"></i>
                <h5>Managers</h5>
                <h3>25</h3>
            </div>
        </div>
    </div>

    <!-- Filters and Actions -->
    <div class="d-flex justify-content-between mb-3">
        <div>
            <input type="text" class="form-control d-inline-block" style="width: 200px;" placeholder="Search employees..." oninput="searchEmployee(this.value)">
            <select class="form-control d-inline-block ms-2" style="width: 200px;" onchange="filterRole(this.value)">
                <option value="">Filter by Role</option>
                <option value="Admin">Admin</option>
                <option value="Manager">Manager</option>
                <option value="Staff">Staff</option>
            </select>
        </div>
        <div>
            <button class="btn btn-outline-danger me-2" onclick="downloadPDF()"><i class="fas fa-file-pdf"></i> Download PDF</button>
            <button class="btn btn-outline-primary me-2" onclick="downloadCSV()"><i class="fas fa-file-csv"></i> Download CSV</button>
            <button class="btn btn-success" onclick="openAddEmployeeModal()">
                <i class="fas fa-plus me-2"></i> Add Employee
            </button>
        </div>
    </div>

    <!-- Employee Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-sm" id="employeeTable">
            <thead class="table-dark text-center">
                <tr>
                    <th>Full Name</th>
                    <th>Role</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="employeeTableBody">
                <tr>
                    <td>John Doe</td>
                    <td>Manager</td>
                    <td>johndoe</td>
                    <td>password123</td>
                    <td>123-456-7890</td>
                    <td>johndoe@example.com</td>
                    <td class="text-center">
                        <button class="btn btn-info btn-sm" onclick="openViewEmployeeModal('John Doe', 'Manager', 'johndoe', 'password123', '123-456-7890', 'johndoe@example.com')">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="deleteEmployee(this)">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Jane Smith</td>
                    <td>Staff</td>
                    <td>janesmith</td>
                    <td>password456</td>
                    <td>987-654-3210</td>
                    <td>janesmith@example.com</td>
                    <td class="text-center">
                        <button class="btn btn-info btn-sm" onclick="openViewEmployeeModal('Jane Smith', 'Staff', 'janesmith', 'password456', '987-654-3210', 'janesmith@example.com')">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="deleteEmployee(this)">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Employee Modal -->
<div id="addEmployeeModal" class="modal">
    <div class="modal-content p-4">
        <h4 class="mb-3"><i class="fas fa-user-plus"></i> Add Employee</h4>
        <form id="addEmployeeForm">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter full name">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" placeholder="Enter role">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Phone No</label>
                <input type="text" class="form-control" id="mobile" placeholder="Enter phone number">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email address">
            </div>
            <button type="button" class="btn btn-success" onclick="addEmployee()">
                <i class="fas fa-check"></i> Add
            </button>
            <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
        </form>
    </div>
</div>

<!-- View Employee Modal -->
<div id="viewEmployeeModal" class="modal">
    <div class="modal-content p-4">
        <h4 class="mb-3"><i class="fas fa-eye"></i> View Employee</h4>
        <div id="viewEmployeeDetails"></div>
        <button type="button" class="btn btn-secondary" onclick="closeViewModal()">Close</button>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>

<script>
    // Open Add Employee Modal
    function openAddEmployeeModal() {
        document.getElementById('addEmployeeModal').style.display = 'flex';
    }

    // Close Add Employee Modal
    function closeModal() {
        document.getElementById('addEmployeeModal').style.display = 'none';
    }

    // Open View Employee Modal
    function openViewEmployeeModal(name, role, username, password, phone, email) {
        document.getElementById('viewEmployeeDetails').innerHTML = `
            <p><strong>Full Name:</strong> ${name}</p>
            <p><strong>Role:</strong> ${role}</p>
            <p><strong>Username:</strong> ${username}</p>
            <p><strong>Password:</strong> ${password}</p>
            <p><strong>Phone No:</strong> ${phone}</p>
            <p><strong>Email:</strong> ${email}</p>
        `;
        document.getElementById('viewEmployeeModal').style.display = 'flex';
    }

    // Close View Employee Modal
    function closeViewModal() {
        document.getElementById('viewEmployeeModal').style.display = 'none';
    }

    // Add Employee to Table
    function addEmployee() {
        const name = document.getElementById('name').value;
        const role = document.getElementById('role').value;
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        const mobile = document.getElementById('mobile').value;
        const email = document.getElementById('email').value;

        const table = document.getElementById('employeeTableBody');
        const newRow = table.insertRow();
        newRow.innerHTML = `
            <td>${name}</td>
            <td>${role}</td>
            <td>${username}</td>
            <td>${password}</td>
            <td>${mobile}</td>
            <td>${email}</td>
            <td class="text-center">
                <button class="btn btn-info btn-sm" onclick="openViewEmployeeModal('${name}', '${role}', '${username}', '${password}', '${mobile}', '${email}')">
                    <i class="fas fa-eye"></i> View
                </button>
                <button class="btn btn-danger btn-sm" onclick="deleteEmployee(this)">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </td>
        `;
        closeModal();
        alert('Employee added successfully!');
    }

    // Delete Employee
    function deleteEmployee(button) {
        if (confirm('Are you sure you want to delete this employee?')) {
            const row = button.closest('tr');
            row.remove();
        }
    }

    // Download PDF
    function downloadPDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        doc.text('Employee Data', 10, 10);
        doc.autoTable({ html: '#employeeTable' });
        doc.save('employees.pdf');
    }

    // Download CSV
    function downloadCSV() {
        const table = document.getElementById('employeeTable');
        const rows = table.querySelectorAll('tr');
        const data = [];
        rows.forEach(row => {
            const cells = row.querySelectorAll('td, th');
            const rowData = [];
            cells.forEach(cell => rowData.push(cell.textContent.trim()));
            if (rowData.length > 0) data.push(rowData);
        });

        const csv = Papa.unparse(data);
        const blob = new Blob([csv], { type: 'text/csv' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'employees.csv';
        link.click();
    }

    // Search Employee
    function searchEmployee(query) {
        console.log('Searching for:', query);
    }

    // Filter by Role
    function filterRole(role) {
        console.log('Filtering by role:', role);
    }
</script>

<style>
    /* Modal styling */
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: #fff;
        border-radius: 8px;
        padding: 20px;
        width: 80%;
        max-width: 600px;
    }
</style>
@endsection
