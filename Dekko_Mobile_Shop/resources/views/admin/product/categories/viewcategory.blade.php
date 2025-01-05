@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Categories</h1>

    <a href="#" data-ajax-popup="true" data-url="{{ route('admin.product.categories.create') }}">
        <button class="btn btn-success"> <i class="fas fa-plus me-2"></i>Add Category </button>
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>

                        <a href="#" data-ajax-popup="true" data-url="{{ route('admin.product.categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.product.categories.destroy', $category) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


      <!-- Modal for AJAX -->
<div class="modal fade" id="commanModel" tabindex="-1" aria-labelledby="commanModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commanModelLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Dynamic content will be loaded here -->
            </div>
        </div>
    </div>
</div>

  <!-- Modal for AJAX -->
  <div class="modal fade" id="commanModel" tabindex="-1" aria-labelledby="commanModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commanModelLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Dynamic content will be loaded here -->
            </div>
        </div>
    </div>
</div>

</div>
@endsection
