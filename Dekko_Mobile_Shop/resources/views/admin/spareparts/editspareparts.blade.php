<form method="POST" action="{{ route('admin.spareparts.update', 1) }}" id="sparepartForm" data-ajax="true"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="created_by" value="admin">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="model">Brand</label>
        <select class="form-control" id="brand" name="model" required>
            {{-- @foreach ($models as $model)
                <option value="{{ $model->id }}">{{ $model->name }}</option>
            @endforeach --}}
            <option value="1">Brand 1</option>
            <option value="2">Brand 2</option>
            <option value="3">Brand 3</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="stock_quantity">Stock Quantity</label>
        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
    </div>
    <div class="d-flex mb-3">
        <div class="d-grid">
            <button class="btn btn-primary btn-block mt-2" type="submit">{{ 'Update Spareparts' }}</button>
        </div>
    </div>
</form>
