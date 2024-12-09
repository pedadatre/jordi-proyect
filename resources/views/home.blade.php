<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to the Home Page</h1>
        @if (Auth::check())
            <p>Welcome back, {{ Auth::user()->name }}!</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        @else
            <p>Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a>.</p>
        @endif
    </div>
@endsection