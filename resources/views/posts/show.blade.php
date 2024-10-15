@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
<div class="container mt-5">
    <div class="card bg-dark text-light shadow-lg">
        <div class="card-header">
            <h2>{{ $post->title }}</h2>
        </div>
        <div class="card-body">
            @if ($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" alt="Post image" class="img-fluid mb-3" style="max-width: 100%;">
            @else
                <img src="https://via.placeholder.com/600" alt="Default Image" class="img-fluid mb-3" style="max-width: 100%;">
            @endif

            <h5>Category: {{ $post->category->name }}</h5>
            
            <p>{{ $post->content }}</p>
            <p>Status: 
                <span class="badge {{ $post->is_published ? 'bg-success' : 'bg-secondary' }}">
                    {{ $post->is_published ? 'Published' : 'Draft' }}
                </span>
            </p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('posts.index') }}" class="btn btn-outline-light">
                <i class="fas fa-arrow-left"></i> Back to Posts
            </a>
            <div>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning me-2">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this post?');">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
