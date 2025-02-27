@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/manage_crew.css') }}">
    <div class="container">
        <h1>Manage Crews</h1>
        <a href="{{ route('admin.crews.create') }}" class="btn btn-primary ">Create New Crew</a>
        <form method="GET" action="{{ route('admin.crews.index') }}">
            <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Buscar...">
            <button type="submit">Buscar</button>
        </form>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Año</th>
                    <th>Slogan</th>
                    <th>Color</th>
                    <th>Capacidad</th>
                    <th>Fecha de Fundación</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($crews as $crew)
                    <tr>
                        <td>{{ $crew->name }}</td>
                        <td>{{ $crew->year }}</td>
                        <td>{{ $crew->slogan }}</td>
                        <td>{{ $crew->color }}</td>
                        <td>{{ $crew->capacity }}</td>
                        <td>{{ \Carbon\Carbon::parse($crew->fondation_date)->format('d/m/Y') }}</td>
                        <td>{{ $crew->description }}</td>
                        <td>
                            <a href="{{ route('admin.crews.edit', $crew->id) }}" class=" btn btn-warning">Edit</a>
                            <br>
                            <form action="{{ route('admin.crews.destroy', $crew->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection