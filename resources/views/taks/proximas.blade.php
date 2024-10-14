@extends('layouts.panel')

@section('title', 'Tareas Próximas')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <h3 class="mb-0">Tareas Próximas</h3>
    </div>
    <div class="card-body">
        @if ($tareas->isNotEmpty())
            <ul class="list-group">
                @foreach ($tareas as $tarea)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $tarea->nombreTarea }}</strong> - {{ $tarea->fechaVencimiento }}
                        </div>
                        <div>
                            @if($tarea->prioridad == 1)
                                <span class="badge badge-danger">Alta</span> 
                            @elseif($tarea->prioridad == 2)
                                <span class="badge badge-warning">Media</span> 
                            @elseif($tarea->prioridad == 3)
                                <span class="badge badge-success">Baja</span> 
                            @endif
                            @if($tarea->estado == 'vencida')
                                <span class="badge badge-danger">Vencida</span>
                            @elseif($tarea->estado == 'por_vencer')
                                <span class="badge badge-warning">Por Vencer</span>
                            @else
                                <span class="badge badge-success">Activa</span>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No hay tareas próximas.</p>
        @endif
    </div>
</div>
@endsection
