<!-- resources/views/profile/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password">New Password</label>
                <input id="password" type="password" name="password">
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation">
                @error('password_confirmation')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit">Update Profile</button>
            </div>
        </form>

        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Profile</button>
        </form>
    </div>
@endsection