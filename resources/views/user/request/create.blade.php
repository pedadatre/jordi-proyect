@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/create_user_blade.css') }}">
    <div class="container py-5">
        <h1 class="text-center mb-5 fade-in">Join a Crew</h1>
        <div class="d-flex justify-content-center align-items-center flex-wrap" id="crew-container">
            @foreach ($crews as $crew)
                <div class="crew-card-container position-relative">
                    <div class="card h-100 shadow crew-card">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-3">{{ $crew->name }}</h5>
                            <p class="card-text fst-italic flex-grow-1">"{{ $crew->slogan }}"</p>
                            <div class="mt-auto">
                                <button class="btn info-button mb-2 w-100">More Info</button>
                                <form method="POST" action="{{ route('user.request.store') }}">
                                    @csrf
                                    <input type="hidden" name="crew_id" value="{{ $crew->id }}">
                                    <button type="submit" class="btn join-button w-100">
                                        Join {{ $crew->name }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="crew-sidebar">
                        <button class="close-sidebar">&times;</button>
                        <h5 class="text-primary">{{ $crew->name }}</h5>
                        <p class="text-muted fst-italic">"{{ $crew->slogan }}"</p>
                        <ul>
                            <li><strong>Members:</strong> {{ $crew->capacity }}</li>
                            <li><strong>Founded:</strong> {{ $crew->fondation_date }}</li>
                            <li><strong>Description:</strong> {{ $crew->description }}</li>
                            <li><strong>Location:</strong> {{ $crew->location }}</li>
                            <li><strong>Main Activities:</strong> {{ $crew->main_activities }}</li>
                            <li><strong>Leader:</strong> {{ $crew->leader }}</li>
                            <li><strong>Events Organized:</strong> {{ $crew->events_count }}</li>
                            <li><strong>Contact:</strong> <a href="mailto:{{ $crew->contact_email }}">{{ $crew->contact_email }}</a></li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/create_user_crew_show.js') }}"></script>
@endpush