
@extends('layouts.admin')

@section('content')
<style>
    body {
      background-color: #f8f9fa;
      font-family: 'Arial', sans-serif;
    }
    .brand-container {
      margin: 30px auto;
      max-width: 1000px;
      background: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .brand-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .brand-header h2 {
      margin: 0;
      color: #343a40;
    }
    .table {
      border-radius: 8px;
      overflow: hidden;
    }
    .table th {
      background-color: #007bff;
      color: #fff;
      text-align: center;
    }
    .table td {
      text-align: center;
    }
    .btn-add {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 4px;
    }
    .btn-add:hover {
      background-color: #0056b3;
    }
    .action-buttons .btn {
      margin-right: 5px;
    }
    .pagination {
      justify-content: center;
    }
  </style>


<div class="container brand-container">
  <div class="brand-header">
    <h2>Brand Management</h2>
    <button class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addBrandModal">+ Add Brand</button>

    {{-- <button class="btn btn-sm btn-primary me-2 mb-3" data-url="{{ route('admin.spareparts.create') }}"
    data-size="md" data-ajax-popup="true" data-title="Add Spareparts">
    <i class="las la-plus" title="Add Spareparts"></i> Add Spare_parts
</button> --}}

</div>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Brand Name</th>
        <th>Model Name</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Samsung</td>
        <td>Galaxy S Series</td>
        <td>Premium smartphones by Samsung</td>
        <td class="action-buttons">
          <button class="btn btn-warning btn-sm">Edit</button>
          <button class="btn btn-danger btn-sm">Delete</button>
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>Apple</td>
        <td>iPhone</td>
        <td>High-end devices from Apple</td>
        <td class="action-buttons">
          <button class="btn btn-warning btn-sm">Edit</button>
          <button class="btn btn-danger btn-sm">Delete</button>
        </td>
      </tr>
      <!-- Add more rows dynamically -->
    </tbody>
  </table>

  <nav>
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav>
</div>

<!-- Add Brand Modal -->
<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addBrandModalLabel">Add New Brand</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addBrandForm">
          <div class="mb-3">
            <label for="brandName" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="brandName" placeholder="Enter brand name">
          </div>
          <div class="mb-3">
            <label for="modelName" class="form-label">Model Name</label>
            <input type="text" class="form-control" id="modelName" placeholder="Enter model name">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" placeholder="Enter description"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="submitForm()">Save</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function submitForm() {
    const brandName = document.getElementById('brandName').value;
    const modelName = document.getElementById('modelName').value;
    const description = document.getElementById('description').value;

    if (brandName && modelName) {
      alert(`Brand: ${brandName}, Model: ${modelName}, Description: ${description}`);
      // Handle form submission logic
    } else {
      alert('Please fill all the fields!');
    }
  }
</script>
@endsection
