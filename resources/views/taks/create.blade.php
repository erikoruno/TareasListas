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
             <a href="{{ url('/tareas')}}" class="btn btn-sm btn-success" >
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
                
                <div class="form-group col-md-6">
                    
                    <input type="text" name="nombreTarea" class="form-control" value="{{old('nombreTarea')}}"  required>
                    <label for="nombreTarea">Nombre de tarea</label>
                </div>

                <div class="form-group col-md-2">
                    <input type="date" placeholder="vencimiento" name="fechaVencimiento" class="form-control" value="{{old('fechaVencimiento')}}"  required>
                     
                </div>
                <div class="form-group col-md-4">
                    <label for="fechaVencimiento">Fecha de Vencimiento</label>
                </div>
                <div class="form-group col-md-1">
                    
                    <select name="prioridad"  class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <label for="prioridad">Prioridad</label>
                </div>
            

                <button type="submit" class="btn btn-sm btn-primary">Crear tarea</button>
            </form>
        </div>
      </div>
    </div>
    </div>
@endsection
{{-- @if ($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <i class="ti ti-bolt"></i>
                    <strong>Por favor!</strong> {{ $error}}
                </div>
                @endforeach --}}

             {{-- @endif --}}