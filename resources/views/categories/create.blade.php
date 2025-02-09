@extends('layouts.app')

@section('title', 'Add Kategori')

@section('content')
<h1>Add Kategori</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
