@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<h1>Edit Kategori</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
