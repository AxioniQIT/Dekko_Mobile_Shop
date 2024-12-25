@extends('layouts.admin')
@section('title', 'Spareparts')
@section('content')
@section('content')
    <div class="mb-4"></div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3>Spare_parts List</h3>
                </div>
                <hr>
                <div class="card-header pb-0">
                    <button class="btn btn-sm btn-primary me-2 mb-3" data-url="{{ route('admin.spareparts.create') }}"
                        data-size="md" data-ajax-popup="true" data-title="Add Spareparts">
                        <i class="las la-plus" title="Add Spareparts"></i> Add Spare_parts
                    </button>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Spareparts ID</th>
                                    <th>Spareparts Name</th>
                                    <th>Brand Name </th>
                                    <th>Model Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Stock Quantity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($spareParts as $sparepart)
                                    <tr>
                                        <td>{{ $sparepart->spare_part_id }}</td>
                                        <td>{{ $sparepart->name }}</td>
                                        <td>
                                            @foreach ($sparepart->brands as $brand)
                                                {{ $brand->brand_name }}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($sparepart->brands as $brand)
                                                {{ $brand->model_name }}
                                            @endforeach
                                        </td>
                                        <td>{{ $sparepart->description }}</td>
                                        <td>{{ $sparepart->price }}</td>
                                        <td>{{ $sparepart->stock_quantity }}</td>
                                        <td data-label="Action">
                                            <button class="btn btn-sm btn-success"
                                                data-url="{{ route('admin.spareparts.edit', ['sparePart' => $sparepart->spare_part_id]) }}"
                                                data-size="md" data-ajax-popup="true" data-title="Edit Sparepart">
                                                <i class="fas fa-edit" data-bs-toggle="tooltip" title="Edit Sparepart"></i>
                                            </button>
                                            <form
                                                action="{{ route('admin.spareparts.destroy', ['sparePart' => $sparepart->spare_part_id]) }}"
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
