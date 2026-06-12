@extends('layouts.app')

@section('title', 'Inicio - Sistema de formularios')

@section('content')
    <h1>Inicio</h1>

    <section class="panel">
        <p>Bienvenido, {{ auth()->user()->name }}.</p>
        <p class="muted">Rol actual: {{ auth()->user()->role }}</p>
    </section>

    <section class="panel">
        <h2>Modulos disponibles</h2>
        <div class="actions">
            <a class="btn" href="{{ route('mediciones.index') }}">Ver mediciones</a>
            <a class="btn secondary" href="{{ route('inspecciones.index') }}">Ver inspecciones</a>
        </div>
    </section>
@endsection
