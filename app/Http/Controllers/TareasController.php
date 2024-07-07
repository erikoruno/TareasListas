<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function index(){
        $tareas = Tareas::all();
        return view('taks.index',compact('tareas'));
    }

    public function create(){
        return view('taks.create');
    }

    public function sendData(Request $request){
        

        $tarea = new Tareas();
        $tarea->nombreTarea = $request->input('nombreTarea');
        $tarea->fechaVencimiento = $request->input('fechaVencimiento');
        $tarea->prioridad = $request->input('prioridad');
        $tarea->save();
        return redirect('/tareas')->with('success','Tarea creada correctamente');
    }

    public function edit($id){
        
        $tarea = Tareas::findOrFail($id);
        return view('taks.edit', compact('tarea'));
    }

    public function update(Request $request, Tareas $tarea){
        //dd($request->all());
        $tarea->nombreTarea = $request->input('nombreTarea');
        $tarea->fechaVencimiento = $request->input('fechaVencimiento');
        $tarea->prioridad = $request->input('prioridad');

        $tarea->save();

        return redirect('/tareas')->with('sucess','Tarea actualizada correctamente');
    }

    public function destroy(Tareas $tarea){
        $tarea->delete();
        return redirect('/tareas')->with('success','Tarea eliminada correctamente.');
    }

}
