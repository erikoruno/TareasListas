@extends('layouts.panel')

@section('title', 'Panel')

@section('content')

<div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nueva Tarea</h3>
            </div>
            <div class="col text-right ">
             <a href="{{ url('/tareas')}}" class="btn btn-sm btn-success">
                <i class="ti ti-arrow-left"></i>
                Salir</a>
            </div>
          </div>
        </div>
    </div>
</div>
</div>

<div class="row mt-3">
<div class="col-xl-12 mb-5 mb-xl-0">
    <div class="card shadow-lg">
        <div class="card-body">
            <form role="form" action="{{ url('/tareas')}}" method="POST">
                @csrf

                <!-- Nombre de la tarea -->
                <div class="form-group col-md-6">
                    <input type="text" name="nombreTarea" class="form-control" value="{{old('nombreTarea')}}" required>
                    <label for="nombreTarea">Nombre de tarea</label>
                </div>

                <!-- Fecha de vencimiento -->
                <div class="form-group col-md-2">
                    <input type="date" placeholder="vencimiento" name="fechaVencimiento" class="form-control" value="{{old('fechaVencimiento')}}" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="fechaVencimiento">Fecha de Vencimiento</label>
                </div>

                <!-- Prioridad con semáforo -->
                <div class="form-group col-md-2">
                    <label for="prioridad">Prioridad</label>
                    <div class="d-flex align-items-center">
                        <!-- Indicador del semáforo -->
                        <div id="semaforo" style="width: 20px; height: 20px; background-color: green; margin-right: 10px; border-radius: 50%;"></div>

                        
                        <select name="prioridad" id="prioridad" class="form-control" onchange="cambiarColorSemaforo()">
                            <option value="1">Alta</option>
                            <option value="2">Media</option>
                            <option value="3">Baja</option>
                        </select>
                    </div>
                </div>

                <!-- Botón de enviar -->
                <button type="submit" class="btn btn-sm btn-primary">Crear tarea </button>
            </form>
        </div>
    </div>
</div>
</div>

@endsection

@if ($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        <i class="ti ti-bolt"></i>
        <strong>Por favor!</strong> {{ $error}}
    </div>
    @endforeach
@endif


<script>
    function cambiarColorSemaforo() {
        var prioridad = document.getElementById('prioridad').value;
        var semaforo = document.getElementById('semaforo');
        
        if (prioridad == 1) {
            semaforo.style.backgroundColor = 'red'; 
        } else if (prioridad == 2) {
            semaforo.style.backgroundColor = 'yellow'; 
        } else if (prioridad == 3) {
            semaforo.style.backgroundColor = 'green'; 
        }
    }
    
   
    window.onload = function() {
        cambiarColorSemaforo();
    }
</script>
