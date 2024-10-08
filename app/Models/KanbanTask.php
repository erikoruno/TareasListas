<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KanbanTask extends Model
{
    use HasFactory;

    // Define los campos que se pueden asignar masivamente
    protected $fillable = [
        'tareas_id',
        'fecha_inicio',
        'fecha_progreso',
        'fecha_fin',
    ];

    // Relación con el modelo Tareas
    public function tarea()
    {
        return $this->belongsTo(Tareas::class, 'tareas_id');
    }
}




