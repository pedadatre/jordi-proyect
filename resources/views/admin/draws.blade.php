<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sorteo</title>
    @viteReactRefresh
    @vite(['public/js/app.jsx'])
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <div id="draw-container" 
             data-locations="{{ json_encode($locations) }}" 
             data-year="{{ $year }}" 
             data-range-years="{{ json_encode($rangeYears) }}">
        </div>
    @endsection
</body>
</html>