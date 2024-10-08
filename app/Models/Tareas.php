<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreTarea',
        'fechaVencimiento',
        'prioridad',
        'user_id',
        'fecha_creacion',
        'descripcion',
        'hora_creacion',
        'estado',
        'tipo_tarea'
    ];

    protected $casts = [
        'estado' => 'boolean',
        'fecha_creacion' => 'datetime',
        'hora_creacion' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toggleStatus()
    {
        $this->estado = !$this->estado;
        $this->save();
    }

    public function isExpired()
    {
        return $this->fechaVencimiento < now();
    }

    public function scopeActive($query)
    {
        return $query->where('estado', true);
    }

    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}




