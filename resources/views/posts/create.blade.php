@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<div class="container mt-5">
    <h1 class="text-light">Create Post</h1>
    <a href="{{ route('posts.index') }}" class="btn btn-outline-light mb-3">
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

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-dark p-4 text-light rounded shadow-sm">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control bg-secondary text-white" placeholder="Enter post title" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="author_id">Author</label>
                    <select name="author_id" id="author_id" class="form-select bg-secondary text-white" required>
                        <option value="" disabled selected>Select Author</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-select bg-secondary text-white" required>
                        <option value="" disabled selected>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control bg-secondary text-white" rows="6" placeholder="Write the post content here..." required></textarea>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control bg-secondary text-white">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check mt-4">
                    <input type="checkbox" class="form-check-input" id="is_published" name="is_published">
                    <label class="form-check-label" for="is_published">Publish</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-outline-light">
            <i class="fas fa-save"></i> Submit
        </button>
    </form>
</div>
@endsection
