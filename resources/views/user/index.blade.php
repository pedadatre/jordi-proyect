@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <div class="dashboard-sidebar">
        <div class="sidebar-card">
            <h5 class="sidebar-title">User Menu</h5>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="{{ route('user.request.create') }}" class="sidebar-link">Request to Join a Crew</a>
                </li>
                <!-- Add more menu items here -->
            </ul>
        </div>
    </div>
    <div class="dashboard-main">
        <div class="main-card welcome-card">
            <h1 class="dashboard-title">User Dashboard</h1>
            <p class="welcome-message">Welcome, {{ Auth::user()->name }}!</p>
        </div>

        <div class="main-card requests-card">
            <h2 class="card-title">Your Requests</h2>
            <div class="table-responsive">
                <table class="requests-table">
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
                                <td>
                                    <span class="status-badge status-{{ strtolower($request->status) }}">
                                        {{ $request->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_dashboard.css') }}">
@endpush