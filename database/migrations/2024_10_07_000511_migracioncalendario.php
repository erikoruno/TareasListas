<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigracionCalendario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tareas', function (Blueprint $table) {
            $table->dateTime('fecha_creacion'); // Asegúrate de que este campo es de tipo datetime
            $table->string('descripcion')->nullable();
            $table->time('hora_creacion'); // Asegúrate de que este campo es de tipo time
            $table->boolean('estado')->default(true);
            $table->string('tipo_tarea')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tareas', function (Blueprint $table) {
            $table->dropColumn('fecha_creacion'); // Eliminar columna fecha_creacion
            $table->dropColumn('descripcion'); // Eliminar columna descripcion
            $table->dropColumn('hora_creacion'); // Eliminar columna hora_creacion
            $table->dropColumn('estado'); // Eliminar columna estado
            $table->dropColumn('tipo_tarea'); // Eliminar columna tipo_tarea
        });
    }
}


