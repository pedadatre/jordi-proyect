<!-- resources/views/user/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Dashboard</h1>
        <p>Welcome, User!</p>

        <!-- Enlace para enviar una solicitud -->
        <a href="{{ route('user.request.create') }}" class="btn btn-primary">Request to Join a Crew</a>

        <!-- Mostrar solicitudes enviadas -->
        <h2 class="mt-4">Your Requests</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Crew</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach(Auth::user()->requests as $request)
                    <tr>
                        <td>{{ $request->crew->name }}</td>
                        <td>{{ $request->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection