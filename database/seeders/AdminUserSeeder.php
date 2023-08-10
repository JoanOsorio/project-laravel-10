<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Events\UserActionEvent;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
       
        // Crear el usuario administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Aquí define la contraseña del administrador
            'role' => 1
        ]);

        $user = 1;
        $actionDetails = 'Acción realizada';

        // Crea y envía una instancia de UserActionEvent con los argumentos adecuados
        event(new UserActionEvent($user, $actionDetails));
    }
}
