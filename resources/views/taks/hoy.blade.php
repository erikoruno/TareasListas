@extends('layouts.panel')

@section('title', 'Tareas de Hoy')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <h3 class="mb-0">Tareas para hoy</h3>
    </div>
    <div class="card-body">
        @if ($tareas->isNotEmpty())
            <ul>
                @foreach ($tareas as $tarea)
                    <li>{{ $tarea->nombreTarea }} - {{ $tarea->fechaVencimiento }}</li>
                @endforeach
            </ul>
        @else
            <p>No hay tareas para hoy.</p>
        @endif
    </div>
</div>
@endsection
