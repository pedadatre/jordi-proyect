
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/edit_profile.css') }}">
    <div class="container">
        <h1>Edit Profile</h1>
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <!-- Crew -->
            <div class="form-group">
                <label for="crew">Crew</label>
                <input id="crew" type="text" class="form-control" name="crew" value="{{ auth()->user()->crews->isNotEmpty() ? auth()->user()->crews->first()->name : 'No Crew' }}" readonly>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">New Password</label>
                <input id="password" type="password" class="form-control" name="password">
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
@endsection