@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<div class="container mt-5">
    <h1 class="text-light">Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-outline-light mb-3">
        <i class="fas fa-plus"></i> Create Post
    </a>

    <div class="list-group">
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <div class="list-group-item bg-dark text-light mb-3 d-flex justify-content-between align-items-center shadow-sm">
                    <div class="d-flex">
                        @if ($post->image)
                            <img src="{{ asset('storage/'.$post->image)}}" alt="Post image" class="img-thumbnail me-3" style="width: 100px; height: 100px;">
                        @else
                            <img src="https://via.placeholder.com/100" alt="Default Image" class="img-thumbnail me-3" style="width: 100px; height: 100px;">
                        @endif

                        <div>
                            <h5><a href="{{ route('posts.show', $post) }}" class="text-light">{{ $post->title }}</a></h5>
                            <p class="mb-0">in category {{ $post->category->name }}</p>
                            <span class="badge {{ $post->is_published ? 'bg-success' : 'bg-secondary' }}">
                                {{ $post->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-sm me-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure want to delete this post?');">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="list-group-item bg-dark text-light">No data</div>
        @endif
    </div>
</div>
@endsection
