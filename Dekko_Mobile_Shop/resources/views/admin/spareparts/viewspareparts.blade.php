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
                                    <th>Brand Name </th>
                                    <th>Spareparts Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Stock Quantity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td> 1 </td>
                                <td> Brand 1 </td>
                                <td> Spareparts 1 </td>
                                <td> Description 1 </td>
                                <td> Price 1 </td>
                                <td> Stock Quantity 1 </td>
                                <td data-label="Action">
                                    <button class="btn btn-sm btn-success"
                                        data-url="{{ route('admin.spareparts.edit', 1) }}" data-size="md"
                                        data-ajax-popup="true" data-title="Edit Sparepart">
                                        <i class="fas fa-edit" data-bs-toggle="tooltip" title="Edit Sparepart"></i>
                                    </button>
                                    <form action="{{ route('admin.spareparts.destroy', 1) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger show_confirm">
                                            <i class="fas fa-trash-alt" data-bs-toggle="tooltip" title="Delete"></i>
                                        </button>
                                    </form>
                                </td>

                                {{-- @foreach ($artists as $row)
                                    <tr>
                                        <td>{{ $row->aid }}</td>
                                        <td><img src="{{ asset($row->image) }}" class="img-thumbnail"
                                                style="width: 50px; height: 50px;" alt="Artist Image"></td>
                                        <td>{{ $row->artist_name }}</td>
                                        <td>{{ $row->phone_no }}</td>
                                        <td>{{ $row->visible }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary"
                                                data-url="{{ route('useradmin.events.edit_artist', [$row->aid]) }} "
                                                data-size="md" data-ajax-popup="true" data-title="{{ __('Edit Artist') }}">
                                                <i class="ti ti-pencil py-1" data-bs-toggle="tooltip" title="Edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger"
                                                data-url="{{ route('useradmin.events.delete_artist_view', $row->aid) }} "
                                                data-size="md" data-ajax-popup="true"
                                                data-title="{{ __('Delete Artist') }}">
                                                <i class="ti ti-trash py-1" data-bs-toggle="tooltip" title="Delete"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach --}}
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
