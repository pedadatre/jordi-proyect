<!-- resources/views/admin/requests.blade.php -->

@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/requests_admin.css') }}">
    <div class="container">
        <h1>Manage Requests</h1>
        <!-- Aquí puedes agregar el contenido de la vista -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Crew</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí puedes iterar sobre las solicitudes y mostrarlas -->
                @foreach ($requests as $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ $request->user->name }}</td>
                        <td>{{ $request->crew->name }}</td>
                        <td>{{ $request->status }}</td>
                        <td>
                            <!-- Aquí puedes agregar botones para aceptar o rechazar la solicitud -->
                            <form action="{{ route('admin.requests.update', $request->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" name="action" value="accept" class="btn btn-success">Accept</button>
                                <button type="submit" name="action" value="reject" class="btn btn-danger">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection