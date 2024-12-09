<!-- resources/views/user/request.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Request to Join a Crew</h1>
        <form method="POST" action="{{ route('user.request.store') }}">
            @csrf
            <div class="form-group">
                <label for="crew_id">Select Crew</label>
                <select name="crew_id" id="crew_id" class="form-control" required>
                    @foreach($crews as $crew)
          
          
          
          
          
                    <option value="{{ $crew->id }}">{{ $crew->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Send Request</button>
        </form>
    </div>
@endsection