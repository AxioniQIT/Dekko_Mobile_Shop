@extends('layouts.admin')
@section('title', 'Brands')
@section('content')
@section('content')
    <div class="mb-4"></div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3>Brands List</h3>
                </div>
                <hr>
                <div class="card-header pb-0">
                    <button class="btn btn-sm btn-primary me-2 mb-3" data-url="{{ route('admin.brand.create') }}"
                        data-size="md" data-ajax-popup="true" data-title="Add Brand">
                        <i class="las la-plus" title="Add Brand"></i> Add Brand
                    </button>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Brand ID</th>
                                    <th>Brand Name</th>
                                    <th>Model Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->brand_id }}</td>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>{{ $brand->model_name }}</td>
                                        <td>{{ $brand->description }}</td>
                                        <td data-label="Action">
                                            <button class="btn btn-sm btn-success"
                                                data-url="{{ route('admin.brand.edit', ['brand' => $brand->brand_id]) }}"
                                                data-size="md" data-ajax-popup="true" data-title="Edit Brand">
                                                <i class="fas fa-edit" data-bs-toggle="tooltip" title="Edit Brand"></i>
                                            </button>
                                            <form action="{{ route('admin.brand.destroy', ['brand' => $brand->brand_id]) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger show_confirm">
                                                    <i class="fas fa-trash-alt" data-bs-toggle="tooltip" title="Delete"></i>
                                                </button>
                                            </form>
                                        </td>
                                    <tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End of new table structure -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
