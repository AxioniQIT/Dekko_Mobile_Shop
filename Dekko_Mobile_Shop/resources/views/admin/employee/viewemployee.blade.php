@extends('layouts.admin')

@section('title', 'Employee Management')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="text-center mb-4">
        <h1 class="fw-bold"><i class="fas fa-users me-2"></i> Employee Management</h1>
        <p class="text-muted">Manage your employees efficiently</p>
    </div>

    <!-- Search and Add Employee Section -->
    <div class="d-flex flex-wrap justify-content-between mb-3">
        <input type="text" class="form-control flex-grow-1 me-2 mb-2 mb-md-0" placeholder="Search employees..." style="max-width: 300px;">
        <button class="btn btn-success d-flex align-items-center justify-content-center add-employee-btn" onclick="openAddEmployeeModal()">
            <i class="fas fa-plus me-2"></i> Add Employee
        </button>
    </div>

    <!-- Employee Table -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0"><i class="fas fa-table me-2"></i> Employee List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" id="employeeTable">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="employeeTableBody">
                        <tr>
                            <td>John Doe</td>
                            <td>Manager</td>
                            <td>Sales</td>
                            <td>johndoe@example.com</td>
                            <td class="text-center">
                                <button class="btn btn-outline-primary btn-sm" onclick="openEditEmployeeModal('1', 'John Doe', 'Manager', 'Sales', 'johndoe@example.com')">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center bg-light">
            <small class="text-muted">Manage your employees with ease</small>
        </div>
    </div>

    <!-- Add/Edit Employee Modal -->
    <div id="addEmployeeModal" class="modal">
        <div class="modal-content p-4">
            <h4 id="modalTitle" class="mb-3 text-primary"><i class="fas fa-plus-circle"></i> Add Employee</h4>
            <form id="employeeForm">
                <div class="mb-3">
                    <label for="employeeName" class="form-label">Employee Name</label>
                    <input type="text" class="form-control" id="employeeName" placeholder="Enter employee name">
                </div>
                <div class="mb-3">
                    <label for="employeePosition" class="form-label">Position</label>
                    <input type="text" class="form-control" id="employeePosition" placeholder="Enter position">
                </div>
                <div class="mb-3">
                    <label for="employeeDepartment" class="form-label">Department</label>
                    <input type="text" class="form-control" id="employeeDepartment" placeholder="Enter department">
                </div>
                <div class="mb-3">
                    <label for="employeeEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="employeeEmail" placeholder="Enter employee email">
                </div>
                <button type="button" class="btn btn-success" onclick="saveEmployee()">
                    <i class="fas fa-check"></i> Save
                </button>
                <button type="button" class="btn btn-secondary" onclick="closeEmployeeModal()">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Internal CSS -->
    <style>
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
            width: 90%;
            max-width: 500px; /* Restrict modal width */
        }

        .btn {
            min-width: 100px;
        }

        .add-employee-btn {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .add-employee-btn:hover {
            background-color: #218838;
        }

        @media (max-width: 576px) {
            .d-flex {
                flex-direction: column;
                align-items: flex-start;
            }

            .d-flex .form-control {
                margin-bottom: 10px;
            }
        }
    </style>

    <!-- Internal JS -->
    <script>
        let currentEditingEmployeeId = null;

        function openAddEmployeeModal() {
            currentEditingEmployeeId = null;
            document.getElementById('modalTitle').textContent = 'Add Employee';
            document.getElementById('employeeName').value = '';
            document.getElementById('employeePosition').value = '';
            document.getElementById('employeeDepartment').value = '';
            document.getElementById('employeeEmail').value = '';
            document.getElementById('addEmployeeModal').style.display = 'flex';
        }

        function openEditEmployeeModal(id, name, position, department, email) {
            currentEditingEmployeeId = id;
            document.getElementById('modalTitle').textContent = 'Edit Employee';
            document.getElementById('employeeName').value = name;
            document.getElementById('employeePosition').value = position;
            document.getElementById('employeeDepartment').value = department;
            document.getElementById('employeeEmail').value = email;
            document.getElementById('addEmployeeModal').style.display = 'flex';
        }

        function closeEmployeeModal() {
            document.getElementById('addEmployeeModal').style.display = 'none';
        }

        function saveEmployee() {
            const name = document.getElementById('employeeName').value;
            const position = document.getElementById('employeePosition').value;
            const department = document.getElementById('employeeDepartment').value;
            const email = document.getElementById('employeeEmail').value;

            if (!name || !position || !department || !email) {
                alert('Please fill out all fields');
                return;
            }

            const tableBody = document.getElementById('employeeTableBody');

            if (currentEditingEmployeeId) {
                const row = document.querySelector(`[data-employee-id="${currentEditingEmployeeId}"]`);
                row.innerHTML = `
                    <td>${name}</td>
                    <td>${position}</td>
                    <td>${department}</td>
                    <td>${email}</td>
                    <td class="text-center">
                        <button class="btn btn-outline-primary btn-sm" onclick="openEditEmployeeModal('${currentEditingEmployeeId}', '${name}', '${position}', '${department}', '${email}')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                `;
            } else {
                const newRow = document.createElement('tr');
                newRow.dataset.employeeId = Date.now();
                newRow.innerHTML = `
                    <td>${name}</td>
                    <td>${position}</td>
                    <td>${department}</td>
                    <td>${email}</td>
                    <td class="text-center">
                        <button class="btn btn-outline-primary btn-sm" onclick="openEditEmployeeModal('${Date.now()}', '${name}', '${position}', '${department}', '${email}')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                `;
                tableBody.appendChild(newRow);
            }

            closeEmployeeModal();
        }
    </script>
</div>
@endsection
