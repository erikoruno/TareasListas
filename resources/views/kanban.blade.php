@extends('layouts.panel')

@section('title', 'Kanban')

@section('content')

<div class="container mt-5">
    <!-- Modificado: Título con borde, esquinas redondeadas y fondo blanco -->
    <h2 class="text-center mb-4 p-3" style="border: 2px solid #ccc; border-radius: 10px; background-color: white; display: inline-block;">
        Tablero Kanban
    </h2>


    <!-- Botones para agregar y gestionar tareas -->
    <div class="d-flex justify-content-between mb-4">
        <button class="btn btn-primary" id="btnAgregarTarea">Agregar Tarea</button>
        <!-- Modificado: Cambié el nombre y redirijo a la vista de creación de tareas -->
        <a href="{{ url('/tareas/create') }}" class="btn btn-secondary">Crear Tarea</a>
    </div>

    <!-- Contenedor del tablero Kanban -->
    <div class="row">
        <!-- Columna: Fecha Inicio -->
        <div class="col-md-4">
            <h4 class="text-center">Fecha Inicio</h4>
            <div class="kanban-column" id="fechaInicio" style="background-color: rgba(0, 255, 0, 0.2);">
                <!-- Aquí se agregarán tareas -->
            </div>
        </div>

        <!-- Columna: En Curso -->
        <div class="col-md-4">
            <h4 class="text-center">En Curso</h4>
            <div class="kanban-column" id="enCurso" style="background-color: rgba(255, 255, 0, 0.2);">
                <!-- Aquí se agregarán tareas -->
            </div>
        </div>

        <!-- Columna: Finalizado -->
        <div class="col-md-4">
            <h4 class="text-center">Finalizado</h4>
            <div class="kanban-column" id="finalizado" style="background-color: rgba(255, 0, 0, 0.2);">
                <!-- Aquí se agregarán tareas -->
            </div>
        </div>
    </div>

    <!-- Modal para mostrar las tareas activas -->
    <div class="modal fade" id="tareasModal" tabindex="-1" role="dialog" aria-labelledby="tareasModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tareasModalLabel">Tareas Activas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Listado de tareas activas -->
                    <div id="tareasActivas">
                        @foreach($tareasCurso as $tarea)
                            <div class="kanban-task" data-id="{{ $tarea->id }}" onclick="seleccionarTarea('{{ $tarea->id }}', '{{ $tarea->nombreTarea }}', '{{ $tarea->prioridad }}')">
                                {{ $tarea->nombreTarea }} (Prioridad: {{ $tarea->prioridad }})
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para confirmar mover tarea -->
    <div class="modal fade" id="confirmarMoverTareaModal" tabindex="-1" role="dialog" aria-labelledby="confirmarMoverTareaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmarMoverTareaLabel">Mover Tarea</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="tareaSeleccionadaTexto"></p>
                    <button type="button" class="btn btn-success" id="btnMoverTarea">Pasar a En Curso</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Estilos para el tablero y tareas -->
<style>
    .kanban-column {
        border: 1px solid #ccc;
        padding: 10px;
        min-height: 300px;
        border-radius: 8px;
    }

    .kanban-task {
        background-color: #007bff;
        color: white;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 4px;
        cursor: pointer;
    }

    .kanban-task:hover {
        background-color: #0056b3;
    }

    .kanban-column.drag-over {
        background-color: #f1f1f1;
    }
</style>

<!-- Scripts para manejar la selección y el movimiento de tareas -->
<script>
    let tareaSeleccionadaId = null;
    let currentColumn = null;

    // Abrir modal de tareas activas
    document.getElementById('btnAgregarTarea').addEventListener('click', function() {
        $('#tareasModal').modal('show');
    });

    // Función para seleccionar una tarea desde tareas activas y abrir el modal de confirmación
    function seleccionarTarea(id, nombreTarea, prioridad) {
        tareaSeleccionadaId = id;
        document.getElementById('tareaSeleccionadaTexto').innerText = `Tarea: ${nombreTarea} (Prioridad: ${prioridad})`;
        currentColumn = 'tareasActivas';
        $('#tareasModal').modal('hide'); // Cerrar el modal de tareas activas
        document.getElementById('btnMoverTarea').innerText = 'Agregar a Fecha Inicio';
        $('#confirmarMoverTareaModal').modal('show'); // Abrir el modal de confirmación
    }

    // Función para seleccionar una tarea desde "Fecha Inicio" y abrir el modal para pasar a "En Curso"
    document.getElementById('fechaInicio').addEventListener('click', function(event) {
        if (event.target.classList.contains('kanban-task')) {
            tareaSeleccionadaId = event.target.getAttribute('data-id');
            const nombreTarea = event.target.innerText;
            document.getElementById('tareaSeleccionadaTexto').innerText = `Mover: ${nombreTarea}`;
            currentColumn = 'fechaInicio';
            document.getElementById('btnMoverTarea').innerText = 'Pasar a En Curso';
            $('#confirmarMoverTareaModal').modal('show');
        }
    });

    // Función para seleccionar una tarea desde "En Curso" y abrir el modal para pasar a "Finalizado"
    document.getElementById('enCurso').addEventListener('click', function(event) {
        if (event.target.classList.contains('kanban-task')) {
            tareaSeleccionadaId = event.target.getAttribute('data-id');
            const nombreTarea = event.target.innerText;
            document.getElementById('tareaSeleccionadaTexto').innerText = `Mover: ${nombreTarea}`;
            currentColumn = 'enCurso';
            document.getElementById('btnMoverTarea').innerText = 'Pasar a Finalizado';
            $('#confirmarMoverTareaModal').modal('show');
        }
    });

    // Mover tarea seleccionada a la siguiente columna según el estado actual
    document.getElementById('btnMoverTarea').addEventListener('click', function() {
        if (tareaSeleccionadaId) {
            let tarea = document.querySelector(`.kanban-task[data-id='${tareaSeleccionadaId}']`);
            
            if (currentColumn === 'tareasActivas') {
                document.getElementById('fechaInicio').appendChild(tarea); // Mover tarea a "Fecha Inicio"
            } else if (currentColumn === 'fechaInicio') {
                document.getElementById('enCurso').appendChild(tarea); // Mover tarea a "En Curso"
            } else if (currentColumn === 'enCurso') {
                document.getElementById('finalizado').appendChild(tarea); // Mover tarea a "Finalizado"
            }

            $('#confirmarMoverTareaModal').modal('hide'); // Cerrar el modal de confirmación
        }
    });
</script>

@endsection
