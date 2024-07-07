@extends('layouts.panel')

@section('title, Lista')
    
@section('content')

<div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Tareas</h3>
        </div>
        {{-- <div class="col text-right">
          <a href="{{ url('/lotes/create')}}" class="btn btn-sm btn-primary">Nuevo lote</a>
        </div> --}}
      </div>
    </div>
    <div class="card-body">
        {{-- @if(session('notification'))
          <div class="alert alert-success" role="alert">
              {{session('notification')}}
          </div>
        @endif --}}
        {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif --}}

    </div>
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre Tarea</th>
            <th scope="col">Fecha Vencimiento</th>
            <th scope="col">Prioridad</th>
            <th>Acciones</th>
            
          </tr>
        </thead>
        <tbody>
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
             
              <form action="{{ url('/tareas/'.$tarea->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ url('/tareas/'.$tarea->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
              </form>
              
             
            </td>
                
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection