@extends('layouts.panel')

@section('title', 'Kanban')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Tablero Kanban</h2>

    <!-- Botones para agregar y gestionar tareas -->
    <div class="d-flex justify-content-between mb-4">
        <button class="btn btn-primary" id="btnAgregarTarea">Agregar Tarea</button>
        <button class="btn btn-secondary" id="btnGestionarTareas">Gestionar Tareas</button>
    </div>

    <!-- Contenedor del tablero Kanban -->
    <div class="row">
        <!-- Columna: Fecha Inicio -->
        <div class="col-md-4">
            <h4 class="text-center">Fecha Inicio</h4>
            <div class="kanban-column" id="fechaInicio">
                <!-- Aquí se agregarán tareas arrastradas -->
            </div>
        </div>

        <!-- Columna: En Curso -->
        <div class="col-md-4">
            <h4 class="text-center">En Curso</h4>
            <div class="kanban-column" id="enCurso">
                <!-- Aquí se agregarán tareas arrastradas -->
            </div>
        </div>

        <!-- Columna: Finalizado -->
        <div class="col-md-4">
            <h4 class="text-center">Finalizado</h4>
            <div class="kanban-column" id="finalizado">
                <!-- Aquí se agregarán tareas arrastradas -->
            </div>
        </div>
    </div>

    <!-- Modal para mostrar las tareas activas y arrastrarlas -->
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
                            <div class="kanban-task" draggable="true" data-id="{{ $tarea->id }}">
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
</div>

<!-- Estilos para el tablero y tareas -->
<style>
    .kanban-column {
        border: 1px solid #ccc;
        padding: 10px;
        min-height: 300px;
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    .kanban-task {
        background-color: #007bff;
        color: white;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 4px;
        cursor: move;
    }

    .kanban-task:hover {
        background-color: #0056b3;
    }

    .kanban-task.dragging {
        opacity: 0.5;
    }

    .kanban-column.drag-over {
        background-color: #f1f1f1;
    }
</style>

<!-- Scripts para manejar el drag & drop -->
<script>
    let draggedTask = null;

    // Abrir modal de tareas activas
    document.getElementById('btnAgregarTarea').addEventListener('click', function() {
        $('#tareasModal').modal('show');
    });

    // Drag & Drop para tareas
    document.querySelectorAll('.kanban-task').forEach(task => {
        task.addEventListener('dragstart', function() {
            draggedTask = this;
            this.classList.add('dragging');
        });

        task.addEventListener('dragend', function() {
            draggedTask = null;
            this.classList.remove('dragging');
        });
    });

    // Función para permitir soltar en las columnas
    function allowDrop(event) {
        event.preventDefault();
    }

    // Manejadores de arrastre y soltado para las columnas
    document.querySelectorAll('.kanban-column').forEach(column => {
        column.addEventListener('dragover', allowDrop);

        column.addEventListener('drop', function() {
            if (draggedTask) {
                this.appendChild(draggedTask);
            }
        });
    });
</script>

@endsection
