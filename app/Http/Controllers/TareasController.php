<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $user = auth()->user();

        if ($user) {
            $tareas = Tareas::where('user_id', $user->id)->get();
        return view('taks.index',compact('tareas'));    
        } else {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tus tareas.');
        }
        
    }

    public function create(){
        return view('taks.create');
    }

    public function sendData(Request $request){
        
        $user = auth()->user();

        if ($user) {
            $tarea = new Tareas();
        $tarea->nombreTarea = $request->input('nombreTarea');
        $tarea->fechaVencimiento = $request->input('fechaVencimiento');
        $tarea->prioridad = $request->input('prioridad');
        $tarea->user_id= auth()->id();

        $tarea->save();
        return redirect('/tareas')->with('success','Tarea creada correctamente');

        } else {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para crear tareas.');
        }
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

        return redirect('/tareas')->with('info','Tarea actualizada correctamente');
    }

    public function destroy(Tareas $tarea){
        $tarea->delete();
        return redirect('/tareas')->with('danger','Tarea eliminada correctamente.');
    }

   
}
