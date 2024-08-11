@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
<h1>Edit Book</h1>

<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
    </div>
    <div class="mb-3">
        <label for="publisher" class="form-label">Publisher</label>
        <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $book->publisher }}" required>
    </div>
    <div class="mb-3">
        <label for="publication_date" class="form-label">Publication Date</label>
        <input type="date" class="form-control" id="publication_date" name="publication_date" value="{{ $book->publication_date }}" required>
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-select" id="category_id" name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
