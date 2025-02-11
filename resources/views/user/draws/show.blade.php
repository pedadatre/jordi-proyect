@extends('layouts.app')

@section('content')
<div id="user-draw-container" 
     data-locations="{{ json_encode($locations) }}"
     data-year="{{ $year }}"
     data-range-years="{{ json_encode($rangeYears) }}"
     data-user-crew="{{ json_encode($userCrew) }}">
</div>
@endsection

@push('scripts')
    @viteReactRefresh
    @vite(['public/js/app1.jsx'])
@endpush