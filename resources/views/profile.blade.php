{{-- resources/views/profile.blade.php --}}
@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow" style="width: 500px;">
        <div class="card-body text-center">
            <h2 class="card-title">{{ Auth::user()->name }}'s Profile</h2>
            <h5 class="card-subtitle mb-2 text-muted">{{ Auth::user()->email }}</h5>
            <p class="card-text">Joined on: {{ Auth::user()->created_at->format('F j, Y') }}</p>
            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection
