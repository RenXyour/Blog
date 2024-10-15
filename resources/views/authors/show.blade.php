@extends('layouts.app')

@section('title', 'Author Details')

@section('content')
<div class="container mt-4">
    <div class="card bg-dark text-light shadow-lg">
        <div class="card-header">
            <h2>{{ $author->name }}</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title">Biography</h5>
            <p class="card-text">{{ $author->bio }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('authors.index') }}" class="btn btn-outline-light">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-outline-warning">
                <i class="fas fa-edit"></i> Edit Author
            </a>
        </div>
    </div>
</div>
@endsection
