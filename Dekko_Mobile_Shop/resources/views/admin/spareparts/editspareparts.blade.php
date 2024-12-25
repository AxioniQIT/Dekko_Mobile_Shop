<form method="POST" action="{{ route('admin.spareparts.update', $sparePart->spare_part_id) }}" id="sparepartForm"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="hidden" name="updated_by" value="admin">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="sparepart_name"
            value="{{ old('sparepart_name', $sparePart->name) }}" maxlength="255" required>
    </div>

    <div class="form-group">
        <label for="brand">Brand</label>
        <select class="form-control" id="brand" name="brand_id" required>
            <option value="">Select Brand</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->brand_id }}" {{ $brand_id->brand_id == $brand->brand_id ? 'selected' : '' }}>
                    {{ $brand->brand_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="model">Model</label>
        <select class="form-control" id="model" name="model_name" required>
            <option value="{{ $model_name->model_name }}">{{ $model_name->model_name }} </option>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" maxlength="255">{{ old('description', $sparePart->description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price"
            value="{{ old('price', $sparePart->price) }}" min="1" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="stock_quantity">Stock Quantity</label>
        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity"
            value="{{ old('stock_quantity', $sparePart->stock_quantity) }}" min="1" required>
    </div>

    <div class="d-flex mb-3">
        <div class="d-grid">
            <button class="btn btn-primary btn-block mt-2" type="submit">Update Sparepart</button>
        </div>
    </div>
</form>
<script>
    document.getElementById('brand').addEventListener('change', function() {
        const brandId = this.value;
        const modelSelect = document.getElementById('model');
        modelSelect.innerHTML = '<option value="">Loading...</option>';

        if (brandId) {
            fetch(`/Admin/api/get-models/${brandId}`)
                .then(response => response.json())
                .then(data => {
                    modelSelect.innerHTML = '<option value="">Select Model</option>';
                    data.forEach(model => {
                        const option = document.createElement('option');
                        option.value = model.model_name;
                        option.textContent = model.model_name;
                        modelSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    modelSelect.innerHTML = '<option value="">Error loading models</option>';
                });
        } else {
            modelSelect.innerHTML = '<option value="">Select Model</option>';
        }
    }); <
</script>
