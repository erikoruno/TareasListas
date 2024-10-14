@extends('layouts.panel')

@section('title', 'Editar')

@section('content')
<div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Editar tarea</h3>
                    </div>
                    <div class="col text-right ">
                        <a href="{{ url('/tareas')}}" class="btn btn-sm btn-success">
                            <i class="ti ti-arrow-left"></i>
                            Regresar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <form role="form" action="{{ url('/tareas/'.$tarea->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombreTarea">Nombre Tarea</label>
            <input type="text" name="nombreTarea" class="form-control" value="{{ old('nombreTarea', $tarea->nombreTarea) }}" required>
        </div>

        <div class="form-group">
            <label for="fechaVencimiento">Fecha vencimiento</label>
            <input type="date" name="fechaVencimiento" class="form-control" value="{{ old('fechaVencimiento', $tarea->fechaVencimiento) }}" required>
        </div>

        <div class="form-group">
            <label for="prioridad">Prioridad</label>
            <select name="prioridad" id="prioridad" class="form-control" onchange="cambiarColorSemaforo()">
                <option value="1" {{ $tarea->prioridad == 1 ? 'selected' : '' }}>Alta</option>
                <option value="2" {{ $tarea->prioridad == 2 ? 'selected' : '' }}>Media</option>
                <option value="3" {{ $tarea->prioridad == 3 ? 'selected' : '' }}>Baja</option>
            </select>
        </div>

        <div class="form-group">
            <label for="semaforo">Estado de Prioridad:</label>
            <div id="semaforo" style="width: 30px; height: 30px; border-radius: 30%; margin-top: 5px; border: 2px solid #ccc;"></div>
        </div>

        <button type="submit" class="btn btn-sm btn-primary">Guardar tarea</button>
    </form>
</div>

<script>
    function cambiarColorSemaforo() {
        var prioridad = document.getElementById('prioridad').value;
        var semaforo = document.getElementById('semaforo');
        
        if (prioridad == 1) {
            semaforo.style.backgroundColor = 'red'; // Alta prioridad
        } else if (prioridad == 2) {
            semaforo.style.backgroundColor = 'yellow'; // Prioridad media
        } else if (prioridad == 3) {
            semaforo.style.backgroundColor = 'green'; // Baja prioridad
        }
    }
    
    window.onload = function() {
        cambiarColorSemaforo(); // Establece el color inicial según la prioridad actual
    }
</script>
@endsection
