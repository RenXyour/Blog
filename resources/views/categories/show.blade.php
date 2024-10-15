@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-light shadow-lg rounded-3">
                <div class="card-header text-center">
                    <h2><i class="fas fa-folder"></i> {{ $category->name }}</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Category Details</h5>
                    <p class="card-text"><strong>Description:</strong> {{ $category->description }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-light">
                        <i class="fas fa-arrow-left"></i> Back to Categories
                    </a>
                    <div class="d-flex">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-warning me-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this category?');">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection