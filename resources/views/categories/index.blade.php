@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-light">Categories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-outline-light">
            <i class="fas fa-plus"></i> Create Category
        </a>
    </div>

    <div class="list-group mt-3">
        @if (count($categories) > 0)
            @foreach ($categories as $category)
                <div class="list-group-item bg-dark text-light d-flex justify-content-between align-items-center shadow-sm mb-2">
                    <div>
                        <i class="fas fa-folder"></i>
                        <a href="{{ route('categories.show', $category->id) }}" class="text-white">{{ $category->name }}</a>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this category?');">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="list-group-item bg-secondary text-light">No Categories Available</div>
        @endif
    </div>
</div>
@endsection
