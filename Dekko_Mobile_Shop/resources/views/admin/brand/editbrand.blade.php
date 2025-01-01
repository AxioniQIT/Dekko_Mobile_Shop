<form method="POST" action="{{ route('admin.brand.update', $brand->brand_id) }}" id="brandForm"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="updated_by" value="admin">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="brand_name" maxlength="255"
            value="{{ old('brand_name', $brand->brand_name) }}" required>
    </div>
    <div class="form-group">
        <label for="model_name">Model Name</label>
        <input type="text" class="form-control" id="model_name" name="model_name" maxlength="255"
            value="{{ old('model_name', $brand->model_name) }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" maxlength="255">{{ old('description', $brand->description) }}</textarea>
    </div>
    <div class="d-flex mb-3">
        <div class="d-grid">
            <button class="btn btn-primary btn-block mt-2" type="submit">{{ 'Update Brand' }}</button>
        </div>
    </div>
</form>

<style>
    .form-group {
        margin-bottom: 15px;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<script>
    document.getElementById('brandForm').addEventListener('submit', function (e) {
        e.preventDefault();
        alert('Brand updated successfully!');
        this.submit();
    });
</script>
