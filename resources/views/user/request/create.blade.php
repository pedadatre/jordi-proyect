@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5 fade-in">Join a Crew</h1>
    <div class="d-flex justify-content-center align-items-center flex-wrap" id="crew-container">
        @foreach ($crews as $crew)
            <div class="crew-card-container position-relative">
                <div class="card h-100 shadow crew-card">
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title mb-3">{{ $crew->name }}</h5>
                        <p class="card-text fst-italic flex-grow-1">"{{ $crew->slogan }}"</p>
                        <form method="POST" action="{{ route('user.request.store') }}" class="mt-auto">
                            @csrf
                            <input type="hidden" name="crew_id" value="{{ $crew->id }}">
                            <button type="submit" class="btn join-button">
                                Join {{ $crew->name }}
                            </button>
                        </form>
                    </div>
                    <div class="spotlight"></div>
                </div>
                <!-- Sidebar -->
                <div class="crew-sidebar">
                    <h5 class="text-primary">{{ $crew->name }}</h5>
                    <p class="text-muted fst-italic">"{{ $crew->slogan }}"</p>
                    <ul>
                        <li><strong>Year of Creation:</strong> {{ $crew->year }}</li>
                        <li><strong>Capacity:</strong> {{ $crew->capacity }} members</li>
                        <li><strong>Foundation Date:</strong> {{ $crew->fondation_date->format('F j, Y') }}</li>
                        <li><strong>Color Theme:</strong> <span style="color: {{ $crew->color }}">{{ ucfirst($crew->color) }}</span></li>
                    </ul>
                    <button class="btn btn-secondary close-sidebar">Close</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/create_user_blade.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/create_user_blade.js') }}"></script>
@endpush
