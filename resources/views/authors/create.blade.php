@extends('layouts.app')

@section('title', 'Create Author')

@section('content')
<div class="container mt-4">
    <h1 class="text-light">Create Author</h1>
    <a href="{{ route('authors.index') }}" class="btn btn-outline-light mb-3">
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

    <form action="{{ route('authors.store') }}" method="POST" class="bg-dark p-4 text-light rounded shadow-sm">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control bg-secondary text-white" value="{{ old('name') }}">
        </div>
        <div class="form-group mb-3">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" class="form-control bg-secondary text-white">{{ old('bio') }}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-light">
            <i class="fas fa-save"></i> Submit
        </button>
    </form>
</div>
@endsection
