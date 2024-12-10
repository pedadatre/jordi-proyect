
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/edit_crew.css') }}">
    <div class="container">
        <h1>Edit Crew</h1>
        <form method="POST" action="{{ route('admin.crews.update', $crew->id) }}">
            @csrf
            @method('PATCH')
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
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" class="form-control" id="capacity" name="capacity" value="{{ $crew->capacity }}" required>
            </div>
            <div class="form-group">
                <label for="fondation_date">Fondation Date</label>
                <input type="date" class="form-control" id="fondation_date" name="fondation_date" value="{{ $crew->fondation_date }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $crew->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection