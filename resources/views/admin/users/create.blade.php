
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/create_admin_user_blade.css') }}">
    <div class="container">
        <h1>Create User</h1>
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" class="form-control" id="surname" name="surname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="Bday">Birthday</label>
                <input type="date" class="form-control" id="Bday" name="Bday" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="form-group">
                <label for="crew_id">Crew</label>
                <select class="form-control" id="crew_id" name="crew_id">
                    @foreach($crews as $crew)
                        <option value="{{ $crew->id }}">{{ $crew->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection