@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Crew</h1>
        <form method="POST" action="{{ route('admin.crews.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" class="form-control" id="year" name="year" required>
            </div>
            <div class="form-group">
                <label for="slogan">Slogan</label>
                <input type="text" class="form-control" id="slogan" name="slogan" required>
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" class="form-control" id="color" name="color" required>
            </div>
            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div>
            <div class="form-group">
                <label for="fondation_date">Fondation Date</label>
                <input type="date" class="form-control" id="fondation_date" name="fondation_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection