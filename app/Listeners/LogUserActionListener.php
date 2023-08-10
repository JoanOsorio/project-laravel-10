<?php

namespace App\Listeners;

use App\Models\UserActionLog; // Importa el modelo UserActionLog para registrar las acciones.
use App\Events\UserActionEvent; // Importa el evento UserActionEvent que el escuchador manejará.
use App\Models\User; // Importa el modelo User para obtener información sobre el usuario.
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log; // Importa la fachada Log para registrar mensajes en el registro.

class LogUserActionListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        // Constructor vacío: no se realiza ninguna acción al crear el escuchador.
    }

    /**
     * Handle the event.
     */
    public function handle(UserActionEvent $event)
    {
        $user = $event->user; // Obtiene la instancia de usuario del evento.
        $action = $event->action; // Obtiene la acción del evento.

        // Crea un nuevo registro en el modelo UserActionLog con los detalles de la acción.
        UserActionLog::create([
            'user_id' => $user->id, // Asigna el ID del usuario al registro.
            'action' => $action, // Asigna la acción al registro.
        ]);
    }
}
