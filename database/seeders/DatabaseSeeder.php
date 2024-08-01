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
      $user1 =  \App\Models\User::factory()->create([
            'name' => 'Erick',
            'lastname' => 'Ergueta Paravicino',
            'email' => 'eround@hotmail.com',
            'password' => bcrypt('12345678'),

           
        ]);

    $user2 =  \App\Models\User::factory()->create([
        'name' => 'Pepito',
        'lastname' => 'De los Palos',
        'email' => 'loki@gmail.com',
        'password' => bcrypt('12345678'),

    ]);

    \App\Models\Tareas::factory()->create([
        'nombreTarea' => 'Exámen',
        'fechaVencimiento' => '2024/08/20',
        'prioridad' => '1',
        'user_id' => $user1->id,
    ]);

    \App\Models\Tareas::factory()->create([
        'nombreTarea' => 'Bicicleta',
        'fechaVencimiento' => '2024/08/21',
        'prioridad' => '2',
        'user_id' => $user2->id,
    ]);
    }
}
