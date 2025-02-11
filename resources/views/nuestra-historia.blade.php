@extends('layouts.app')

@section('content')
    <div id="nuestra-historia"></div>
@endsection

@push('scripts')
    @viteReactRefresh
    @vite(['public/js/nuestra-historia.jsx'])
@endpush