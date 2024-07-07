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
             <a href="{{ url('/tareas')}}" class="btn btn-sm btn-success" >
                <i class="ti ti-arrow-left"></i>
                Regresar</a>
            </div>
          </div>
        </div>
    </div>
</div>
</div>

        <div class="card-body">
            {{-- @if ($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <i class="ti ti-bolt"></i>
                    <strong>Por favor!</strong> {{ $error}}
                </div>
                @endforeach --}}

             {{-- @endif --}}
            <form role="form" action="{{ url('/tareas/'.$tarea->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombreTarea">Nombre Tarea</label>
                    <input type="text" name="nombreTarea" class="form-control" value="{{old('nombreTarea', $tarea->nombreTarea)}}"  required>
                </div>

                <div class="form-group">
                    <label for="fechaVencimiento">Fecha vencimiento</label>
                    <input type="date" name="fechaVencimiento" class="form-control" value="{{old('fechaVencimiento', $tarea->fechaVencimiento)}}"  required>
                </div>
                <div class="form-group">
                    <label for="prioridad">Prioridad</label>
                    <select name="prioridad" class="form-control">
                        <option value="1" {{ $tarea->prioridad == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $tarea->prioridad == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $tarea->prioridad == 3 ? 'selected' : '' }}>3</option>
                    </select>
                </div>
        

                <button type="submit" class="btn btn-sm btn-primary">Guardar tarea</button>
            </form>

        </div>
      </div>
    
@endsection
{{-- <div class="form-group">
    <label for="categoria_productos_id">Categoría</label>
    <select name="categoria_productos_id" class="form-control">
        @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}">{{$producto->categoria_productos_id == $categoria->id ? 'selected' : ''  }}
            {{ $categoria->nombreCategoria }}
        </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="laboratorios_id">Laboratorio</label>
    <select name="laboratorios_id" class="form-control">
        @foreach ($laboratorios as $laboratorio)
        <option value="{{ $laboratorio->id }}">{{ $producto->laboratorios_id == $laboratorio->id ? 'selected' : ''   }}
            {{ $laboratorio->nombreLaboratorio }}
        </option>
        @endforeach
    </select>
</div> --}}