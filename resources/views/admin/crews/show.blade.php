
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $crew->name }}</h1>
        <p><strong>Año:</strong> {{ $crew->year }}</p>
        <p><strong>Slogan:</strong> {{ $crew->slogan }}</p>
        <p><strong>Color:</strong> {{ $crew->color }}</p>
        <p><strong>Capacidad:</strong> {{ $crew->capacity }}</p>
        <p><strong>Fecha de Fundación:</strong> {{ $crew->fondation_date }}</p>
        <p><strong>Descripción:</strong> {{ $crew->description }}</p>
        <p><strong>Ubicación:</strong> {{ $crew->location }}</p>
        <p><strong>Actividades Principales:</strong> {{ $crew->main_activities }}</p>
        <p><strong>Líder:</strong> {{ $crew->leader }}</p>
        <p><strong>Eventos Organizados:</strong> {{ $crew->events_count }}</p>
        <p><strong>Email de Contacto:</strong> {{ $crew->contact_email }}</p>
    </div>
@endsection