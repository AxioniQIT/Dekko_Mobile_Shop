@extends('layouts.admin')

@section('content')
    <h1>Create New Category</h1>
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
@endsection
