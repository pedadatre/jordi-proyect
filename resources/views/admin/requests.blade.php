<!-- resources/views/admin/requests.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Requests</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Crew</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{ $request->user->name }}</td>
                        <td>{{ $request->crew->name }}</td>
                        <td>{{ $request->status }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.requests.update', $request->id) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="accepted">
                                <button type="submit" class="btn btn-success">Accept</button>
                            </form>
                            <form method="POST" action="{{ route('admin.requests.update', $request->id) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="denied">
                                <button type="submit" class="btn btn-danger">Deny</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection