

@extends('layouts.admin')

@section('title', 'Customer Management')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="text-center mb-4">
        <h1 class="fw-bold"><i class="fas fa-users me-2"></i> Customer Management</h1>
        <p class="text-muted">Manage your customers effectively and efficiently</p>
    </div>

    <!-- Widgets Section -->
    <div class="row mb-4 text-center">
        <div class="col-md-4">
            <div class="card shadow-sm bg-primary text-white p-3">
                <i class="fas fa-user-friends fa-2x mb-2"></i>
                <h5>Total Customers</h5>
                <h3>250</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm bg-success text-white p-3">
                <i class="fas fa-city fa-2x mb-2"></i>
                <h5>Unique Cities</h5>
                <h3>45</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm bg-warning text-dark p-3">
                <i class="fas fa-phone fa-2x mb-2"></i>
                <h5>Contacts Today</h5>
                <h3>18</h3>
            </div>
        </div>
    </div>

    <!-- Search and Add Customer -->
    <div class="d-flex justify-content-between mb-3">
        <input type="text" class="form-control d-inline-block" style="width: 200px;" placeholder="Search customers...">
        <button class="btn btn-success" onclick="openAddCustomerModal()">
            <i class="fas fa-plus me-2"></i> Add Customer
        </button>
    </div>

    <!-- Customer Table -->
<div class="card shadow-lg">
    <div class="card-header bg-primary text-white text-center">
        <h5 class="mb-0"><i class="fas fa-table me-2"></i> Customer List</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle" id="customerTable">
                <thead class="table-light text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Kamal</td>
                        <td>0771223123</td>
                        <td>Thudawa</td>
                        <td>Matara</td>
                        <td class="text-center">
                            <button class="btn btn-outline-primary btn-sm me-2" onclick="openEditCustomerModal('1', 'Kamal', '0771223123', 'Thudawa', 'Matara')">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Nimal</td>
                        <td>0771223123</td>
                        <td>Galle</td>
                        <td>Galle</td>
                        <td class="text-center">
                            <button class="btn btn-outline-primary btn-sm me-2" onclick="openEditCustomerModal('2', 'Nimal', '0771223123', 'Galle', 'Galle')">
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
        <small class="text-muted">Manage your customers with ease</small>
    </div>
</div>


<!-- Add/Edit Customer Modal -->
<div id="addCustomerModal" class="modal" style="display: none;">
    <div class="modal-content p-4">
        <h4 id="modalTitle" class="mb-3 text-primary"><i class="fas fa-user-plus"></i> Add Customer</h4>
        <form id="customerForm">
            <div class="mb-3">
                <label for="customerName" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="customerName" placeholder="Enter customer name">
            </div>
            <div class="mb-3">
                <label for="phoneNo" class="form-label">Phone No</label>
                <input type="text" class="form-control" id="phoneNo" placeholder="Enter phone number">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Enter address">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" placeholder="Enter city">
            </div>
            <button type="button" class="btn btn-success" onclick="saveCustomer()">
                <i class="fas fa-check"></i> Save
            </button>
            <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
        </form>
    </div>
</div>

<script>
    let editingCustomerId = null;

    // Open Add Customer Modal
    function openAddCustomerModal() {
        document.getElementById('modalTitle').textContent = 'Add Customer';
        clearForm();
        editingCustomerId = null;
        document.getElementById('addCustomerModal').style.display = 'flex';
    }

    // Open Edit Customer Modal
    function openEditCustomerModal(id, name, phone, address, city) {
        document.getElementById('modalTitle').textContent = 'Edit Customer';
        document.getElementById('customerName').value = name;
        document.getElementById('phoneNo').value = phone;
        document.getElementById('address').value = address;
        document.getElementById('city').value = city;
        editingCustomerId = id;
        document.getElementById('addCustomerModal').style.display = 'flex';
    }

    // Save Customer
    function saveCustomer() {
        const name = document.getElementById('customerName').value;
        const phone = document.getElementById('phoneNo').value;
        const address = document.getElementById('address').value;
        const city = document.getElementById('city').value;

        if (editingCustomerId) {
            // Update existing customer row
            const rows = document.querySelectorAll('table tbody tr');
            rows.forEach(row => {
                if (row.cells[0].textContent === editingCustomerId) {
                    row.cells[1].textContent = name;
                    row.cells[2].textContent = phone;
                    row.cells[3].textContent = address;
                    row.cells[4].textContent = city;
                }
            });
        } else {
            // Add new customer row
            const table = document.querySelector('table tbody');
            const newRow = table.insertRow();
            const newId = table.rows.length;
            newRow.innerHTML = `
                <td>${newId}</td>
                <td>${name}</td>
                <td>${phone}</td>
                <td>${address}</td>
                <td>${city}</td>
                <td class="text-center">
                    <button class="btn btn-primary btn-sm" onclick="openEditCustomerModal('${newId}', '${name}', '${phone}', '${address}', '${city}')">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            `;
        }

        closeModal();
    }

    // Close Modal
    function closeModal() {
        document.getElementById('addCustomerModal').style.display = 'none';
    }

    // Clear Form
    function clearForm() {
        document.getElementById('customerName').value = '';
        document.getElementById('phoneNo').value = '';
        document.getElementById('address').value = '';
        document.getElementById('city').value = '';
    }
</script>

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
        width: 80%;
        max-width: 600px;
    }
</style>
@endsection
