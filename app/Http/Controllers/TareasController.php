<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TareasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $user = auth()->user();

        if ($user) {
            $tareas = Tareas::where('user_id', $user->id)
                ->where('nombreTarea', 'LIKE', '%' . $texto . '%')
                ->get();

            return view('taks.index', compact('tareas', 'texto'));
        } else {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tus tareas.');
        }
    }

    public function pdf()
    {
        $tareas = Tareas::all();
        $pdf = Pdf::loadView('taks.pdf', compact('tareas'));
        return $pdf->stream();
    }

    public function create()
    {
        return view('taks.create');
    }

    public function sendData(Request $request)
    {
        $user = auth()->user();

        if ($user) {
            $tarea = new Tareas();
            $tarea->nombreTarea = $request->input('nombreTarea');
            $tarea->fechaVencimiento = $request->input('fechaVencimiento');
            $tarea->prioridad = $request->input('prioridad');
            $tarea->user_id = auth()->id();
            $tarea->fecha_creacion = now();  // Asignar la fecha de creación actual
            $tarea->descripcion = $request->input('descripcion');  // Agregar una descripción si es necesario
            $tarea->hora_creacion = now()->format('H:i:s');  // Asignar la hora actual
            $tarea->estado = 'pendiente'; // O el estado inicial que desees
            $tarea->tipo_tarea = $request->input('tipo_tarea');  // Agregar el tipo de tarea si es necesario

            $tarea->save();
            return redirect('/tareas')->with('success', 'Tarea creada correctamente');
        } else {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para crear tareas.');
        }
    }

    public function edit($id)
    {
        $tarea = Tareas::findOrFail($id);
        return view('taks.edit', compact('tarea'));
    }

    public function update(Request $request, Tareas $tarea)
    {
        $tarea->nombreTarea = $request->input('nombreTarea');
        $tarea->fechaVencimiento = $request->input('fechaVencimiento');
        $tarea->prioridad = $request->input('prioridad');

        $tarea->save();

        return redirect('/tareas')->with('info', 'Tarea actualizada correctamente');
    }

    public function destroy(Tareas $tarea)
    {
        $tarea->delete();
        return redirect('/tareas')->with('danger', 'Tarea eliminada correctamente.');
    }

    public function obtenerTareas()
    {
        $user = auth()->user();

        if ($user) {
            $tareas = Tareas::where('user_id', $user->id)->get();
            return view('metodos.agregar_tarea_kanban', compact('tareas'));
        } else {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tus tareas.');
        }
    }


    // Método para mostrar la vista Kanban
    public function kanban()
{
    // Obtener todas las tareas
    $tareas = Tareas::all();

    // Agrupar las tareas según su estado
    $tareasInicio = $tareas->filter(function ($tarea) {
        return $tarea->estado == 'inicio'; // Cambia esto según tu campo de estado
    });

    $tareasCurso = $tareas->filter(function ($tarea) {
        return $tarea->estado == 'curso'; // Cambia esto según tu campo de estado
    });

    $tareasFinalizado = $tareas->filter(function ($tarea) {
        return $tarea->estado == 'finalizado'; // Cambia esto según tu campo de estado
    });

    // Pasar las tareas a la vista
    return view('kanban', [
        'tareasInicio' => $tareasInicio,
        'tareasCurso' => $tareasCurso,
        'tareasFinalizado' => $tareasFinalizado
    ]);
}

////////// rutas para calendario //////////////

public function calendario()
{
    // Obtener todas las tareas con el usuario asociado
    $tareas = Tareas::with('user')->get();

    // Agrupar tareas por fecha de creación
    $diasConTareas = $tareas->filter(function ($tarea) {
        // Validar que la fecha de creación no sea nula
        return !is_null($tarea->fecha_creacion);
    })->groupBy(function ($tarea) {
        return $tarea->fecha_creacion->format('Y-m-d'); // Agrupar por fecha
    });

    // Pasar los días con tareas a la vista
    return view('calendario', [
        'diasConTareas' => $diasConTareas,
        'tareas' => $tareas
    ]);
}


}
