<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to the Home Page</h1>
        @if (Auth::check())
            <p>Welcome back, {{ Auth::user()->name }}!</p>
            @if (Auth::user()->role_id == 1)
                <p>You are logged in as an Admin.</p>
                <!-- Contenido específico para Admin -->
            @elseif (Auth::user()->role_id == 2)
                <p>You are logged in as a User.</p>
                <!-- Contenido específico para User -->
            @endif
        @else
            <p>Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a>.</p>
        @endif
    </div>
    
@endsection
