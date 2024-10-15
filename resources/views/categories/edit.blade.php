@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="container mt-4">
    <h1 class="text-light">Edit Category</h1>
    <a href="{{ route('categories.index') }}" class="btn btn-outline-light mb-3">
        <i class="fas fa-arrow-left"></i> Back
    </a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="bg-dark p-4 text-light rounded shadow-sm">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="form-control bg-secondary text-white" required>
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="{{ old('description', $category->description) }}" class="form-control bg-secondary text-white">
        </div>
        <button type="submit" class="btn btn-outline-light">
            <i class="fas fa-save"></i> Save Changes
        </button>
    </form>
</div>
@endsection
