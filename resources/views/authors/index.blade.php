@extends('layouts.app')

@section('title', 'Authors')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-light">Authors</h1>
        <a href="{{ route('authors.create') }}" class="btn btn-outline-light">
            <i class="fas fa-plus"></i> Create Author
        </a>
    </div>

    <div class="list-group mt-3">
        @if (count($authors) > 0)
            @foreach ($authors as $author)
                <div class="list-group-item bg-dark text-light d-flex justify-content-between align-items-center shadow-sm mb-2">
                    <div>
                        <i class="fas fa-user"></i>
                        <a href="{{ route('authors.show', $author->id) }}" class="text-white">{{ $author->name }}</a>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-sm btn-outline-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this author?');">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="list-group-item bg-secondary text-light">No Authors Available</div>
        @endif
    </div>
</div>
@endsection
