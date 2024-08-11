@extends('layouts.app')

@section('title', 'Add Book')

@section('content')
<h1>Add Book</h1>

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" id="author" name="author" required>
    </div>
    <div class="mb-3">
        <label for="publisher" class="form-label">Publisher</label>
        <input type="text" class="form-control" id="publisher" name="publisher" required>
    </div>
    <div class="mb-3">
        <label for="publication_date" class="form-label">Publication Date</label>
        <input type="date" class="form-control" id="publication_date" name="publication_date" required>
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-select" id="category_id" name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
