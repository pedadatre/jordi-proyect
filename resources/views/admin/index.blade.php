<!-- resources/views/admin/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Welcome, Admin!</p>

        <!-- Enlace para gestionar solicitudes -->
        <a href="{{ route('admin.requests') }}" class="btn btn-primary">Manage Requests</a>
    </div>
@endsection