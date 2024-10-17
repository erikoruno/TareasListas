@extends('layouts.panel')

@section('title', 'Lista')

@section('content')

<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Tareas de {{ auth()->user()->name }} {{ auth()->user()->lastname }}</h3>
        </div>
      </div>
    </div>
    <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
        @endif 

        @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
        @endif

        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif 
    </div>

    <div class="col-xl-12">
      <form action="{{ route('tasks.index') }}" method="GET">
        <div class="form-row align-items-end">
          <div class="col-sm-4">
            <input type="text" class="form-control" name="texto" 
            value="{{ $texto ?? '' }}" placeholder="Busca tarea...."
            style="border: 2px solid #007bff; padding: 10px; font-size: 16px; margin-top: 10px; border-radius: 5px;">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-success">
              <i class="fas fa-search"></i> Buscador
            </button>
          </div>
          <div class="col-auto">
            <a href="{{ url('/tareas/pdf') }}" class="btn btn-dark" target="_blank">
              <i class="fas fa-print"></i> Imprimir tareas
            </a>
          </div>
          <div class="col-auto">
            <a href="{{ route('calendario') }}" class="btn btn-primary" style="margin-top: 10px;" title="Abrir el calendario">Abrir calendario</a>
          </div>
        </div>
      </form>
    </div>
    
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light text-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre Tarea</th>
            <th scope="col">Fecha Vencimiento</th>
            <th scope="col">Prioridad</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @if(isset($tareas) && $tareas->isNotEmpty())
            @foreach ($tareas as $tarea)           
          <tr>
            <th scope="row">{{ $tarea->id }}</th>
            <td>{{ $tarea->nombreTarea }}</td>
            <td>{{ $tarea->fechaVencimiento }}</td>
            <td>{{ $tarea->prioridad }}</td>
            <td> 
              <form action="{{ url('/tareas/'.$tarea->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ url('/tareas/'.$tarea->id.'/edit')}}" class="btn btn-sm btn-primary">
                  <i class="fas fa-edit"></i> Editar</a>
                <button type="submit" class="btn btn-sm btn-danger">
                  <i class="fas fa-trash"></i> Eliminar</button>
              </form>
            </td>        
          </tr>
            @endforeach
          @else
            <tr>
              <td colspan="5" class="text-center">No tienes tareas creadas.</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
</div>
@endsection









