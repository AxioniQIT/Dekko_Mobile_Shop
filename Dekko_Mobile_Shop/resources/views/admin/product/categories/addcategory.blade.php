<form action="{{ route('admin.product.categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="category_name">Category Name:</label>
            <input type="text" name="category_name" id="category_name" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <button type="submit">Save</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


