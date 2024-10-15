@extends('layouts.app')

@section('title', 'Blog MSIB')

@section('content')
<div class="container mt-5 text-center">
    <h1 class="display-4 fw-bold text-light">Welcome to <span class="text-secondary">Blog MSIB</span></h1>
    <p class="lead text-light mb-4">Explore And Manage Blog Post Articles Here</p>

    @guest
        <!-- Tampilkan jika user belum login -->
        <div class="mb-4">
            <a href="{{ route('login') }}" class="btn btn-primary mx-2 btn-lg shadow">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            <a href="{{ route('register') }}" class="btn btn-secondary mx-2 btn-lg shadow">
                <i class="fas fa-user-plus"></i> Register
            </a>
        </div>
    @endguest

    
</div>
@endsection
