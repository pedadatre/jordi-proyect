
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/index_admin_blade.css') }}">
    <div class="container">
        <header>
            <h1>Manage Crews</h1>
            <a href="{{ route('admin.crews.create') }}" class="btn btn-primary">Create Crew</a>
        </header>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Slogan</th>
                    <th>Color</th>
                    <th>Capacity</th>
                    <th>Fondation Date</th>
                    <th>Description</th>
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
                            <div class="description-container">
                                
                                <textarea class="description-edit d-none" id="description-edit-{{ $crew->id }}">{{ $crew->description }}</textarea>
                            </div>
                        </td>
                        <td class="actions">
                            <form action="{{ route('admin.crews.edit', $crew->id) }}" method="GET" style="display:inline;">
                                <button type="submit" class="btn btn-sm btn-secondary">Edit</button>
                            </form>
                            
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

@section('scripts')
    <script src="{{ asset('js/index_admin_inline_edit.js') }}"></script>
@endsection