@extends('layouts.app')

@section('title', 'Index Kategori')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Kategori</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Kategori</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
