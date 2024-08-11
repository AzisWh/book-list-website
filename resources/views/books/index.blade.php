@extends('layouts.app')

@section('title', 'Book')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Book</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('books.index') }}" method="GET" class="mb-4">
    <div class="row">
        <div class="col-md-3">
            <select name="category_id" class="form-control">
                <option value="">All Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Search by Title, Author, Publisher" value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="publication_date" class="form-control" value="{{ request('publication_date') }}">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Submit Filter</button>
        </div>
    </div>
</form>

<!-- Pengecekan apakah ada buku yang ditemukan -->
@if($books->isEmpty())
    <div class="alert alert-warning">
        Buku tidak tersedia.
    </div>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Category</th>
                <th>Publication Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->bookcat ? $book->bookcat->name : 'N/A' }}</td>
                <td>{{ $book->publication_date }}</td>
                <td>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
