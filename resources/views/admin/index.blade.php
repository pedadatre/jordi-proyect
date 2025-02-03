
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Welcome, Admin!</p>

        <!-- Enlace para gestionar solicitudes -->
        <a href="{{ route('admin.requests') }}" class="btn btn-primary">Manage Requests</a>
        <!-- Enlaces a la gestión de usuarios y crews -->
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Manage Users</a>
        <a href="{{ route('admin.crews.index') }}" class="btn btn-primary">Manage Crews</a>
        <!-- Enlace para draws/sorteo -->
        <a href="{{ route('admin.draws') }}" class="btn btn-primary">Manage Draws</a>
    </div>
    </div>
@endsection