@extends('layouts.panel')

@section('title', 'Lista de Tareas')

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
          <div class="alert alert-success" >
              {{session('success')}}
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
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light text-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre Tarea</th>
            <th scope="col">Fecha Vencimiento</th>
            <th scope="col">Prioridad</th>
            <th scope="col">Estado</th> 
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @if(isset($tareas) &&  $tareas->isNotEmpty())

            @foreach ($tareas as $tarea)           
          <tr>
            <th scope="row">
              {{$tarea->id}}
            </th>
            <td>
              {{$tarea->nombreTarea}}
            </td>
            <td>
                {{$tarea->fechaVencimiento}}
            </td>
            <td>
                {{$tarea->prioridad}}
            </td>
            <td>
              
              @if($tarea->estado == 'vencida')
                  <span class="badge badge-danger">Vencida</span>
              @elseif($tarea->estado == 'por_vencer')
                  <span class="badge badge-warning">Por Vencer</span>
              @else
                  <span class="badge badge-success">Activa</span>
              @endif
            </td>
            <td>
              <form action="{{ url('/tareas/'.$tarea->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ url('/tareas/'.$tarea->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
              </form>
            </td>
          </tr>
          @endforeach

          @else
            <tr>
              <td colspan="6" class="text-center">No tienes tareas creadas.</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
</div>

@endsection
