@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/crew_search.css') }}">
    <div class="container">
        <h1>Manage Crews</h1>
        <form method="GET" action="{{ route('admin.crews.index') }}">
            <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Buscar...">
            <button type="submit">Buscar</button>
        </form>
        <table class="table">
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
                        <td>{{ $crew->fondation_date }}</td>
                        <td>{{ $crew->description }}</td>
                        <td>
                            <a href="{{ route('admin.crews.edit', $crew->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('admin.crews.destroy', $crew->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection