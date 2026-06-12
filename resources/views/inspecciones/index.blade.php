@extends('layouts.app')

@section('title', 'Inspecciones')

@section('content')
    <h1>Inspecciones</h1>

    @if (auth()->user()->hasRole(['admin', 'carga']))
        <div class="actions">
            <a class="btn" href="{{ route('inspecciones.create') }}">Nueva inspeccion</a>
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Sector</th>
                <th>Estado</th>
                <th>Observacion</th>
                <th>Cargado por</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inspecciones as $inspeccion)
                <tr>
                    <td>{{ $inspeccion->fecha }}</td>
                    <td>{{ $inspeccion->sector }}</td>
                    <td>{{ $inspeccion->estado }}</td>
                    <td>{{ $inspeccion->observacion ?: '-' }}</td>
                    <td>{{ $inspeccion->usuario?->name ?: '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Todavia no hay inspecciones cargadas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
