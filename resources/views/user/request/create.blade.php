<!-- resources/views/user/request/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Request to Join Crew</h1>
        <form method="POST" action="{{ route('user.request.store') }}">
            @csrf
            <div class="form-group">
                <label for="crew_id">Select Crew</label>
                <select id="crew_id" name="crew_id" class="form-control" required>
                    @foreach ($crews as $crew)
                        <option value="{{ $crew->id }}">{{ $crew->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit Request</button>
        </form>
    </div>
@endsection