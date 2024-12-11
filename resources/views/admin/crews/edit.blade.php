@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/edit_crew.css') }}">
    <div class="container">
        <h1>Edit Crew</h1>
        <form method="POST" action="{{ route('admin.crews.update', $crew->id) }}">
            @csrf
            @method('PATCH')
            <ul class="nav nav-tabs" id="crewEditTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="basic-tab" data-toggle="tab" href="#basic" role="tab" aria-controls="basic" aria-selected="true">Basic Info</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="false">Details</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                </li>
            </ul>
            <div class="tab-content" id="crewEditTabsContent">
                <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $crew->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" class="form-control" id="year" name="year" value="{{ $crew->year }}" required>
                    </div>
                    <div class="form-group">
                        <label for="slogan">Slogan</label>
                        <input type="text" class="form-control" id="slogan" name="slogan" value="{{ $crew->slogan }}" required>
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" class="form-control" id="color" name="color" value="{{ $crew->color }}" required>
                    </div>
                </div>
                <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                    <div class="form-group">
                        <label for="capacity">Capacity</label>
                        <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $crew->capacity }}" required>
                    </div>
                    <div class="form-group">
                        <label for="fondation_date">Foundation Date</label>
                        <input type="date" class="form-control" id="fondation_date" name="fondation_date" value="{{ $crew->fondation_date }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $crew->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ $crew->location }}" required>
                    </div>
                    <div class="form-group">
                        <label for="main_activities">Main Activities</label>
                        <input type="text" class="form-control" id="main_activities" name="main_activities" value="{{ $crew->main_activities }}" required>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="form-group">
                        <label for="leader">Leader</label>
                        <input type="text" class="form-control" id="leader" name="leader" value="{{ $crew->leader }}" required>
                    </div>
                    <div class="form-group">
                        <label for="events_count">Events Organized</label>
                        <input type="number" class="form-control" id="events_count" name="events_count" value="{{ $crew->events_count }}" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_email">Contact Email</label>
                        <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ $crew->contact_email }}" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#crewEditTabs a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    });
</script>
@endpush