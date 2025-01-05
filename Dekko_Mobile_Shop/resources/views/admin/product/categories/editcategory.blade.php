<form action="{{ route('admin.product.categories.update', $category->category_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="category_name" class="form-label">Category Name:</label>
                <input type="text" name="category_name" id="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ old('category_name', $category->category_name) }}" required>
                @error('category_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Category</button>
            <a href="{{ route('admin.product.categories.view') }}" class="btn btn-secondary">Cancel</a>
        </form>
