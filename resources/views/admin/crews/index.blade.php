@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Crews</h1>
        <a href="{{ route('admin.crews.create') }}" class="btn btn-primary">Create Crew</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Slogan</th>
                    <th>Color</th>
                    <th>Capacity</th>
                    <th>Fondation Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($crews as $crew)
                    <tr>
                        <td>{{ $crew->name }}</td>
                        <td>{{ $crew->year }}</td>
                        <td>{{ $crew->slogan }}</td>
                        <td>{{ $crew->color }}</td>
                        <td>{{ $crew->capacity }}</td>
                        <td>{{ $crew->fondation_date }}</td>
                        <td>
                            <a href="{{ route('admin.crews.edit', $crew->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.crews.destroy', $crew->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection