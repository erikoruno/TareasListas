<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name' => 'Erick',
            'lastname' => 'Ergueta Paravicino',
            'email' => 'eround@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);

    \App\Models\Tareas::factory()->create([
        'nombreTarea' => 'Exámen',
        'fechaVencimiento' => '2024/07/21',
        'prioridad' => '1',
    ]);
    }
}
