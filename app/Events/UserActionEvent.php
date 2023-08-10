<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserActionEvent
{
    use Dispatchable, SerializesModels;  // Utiliza los rasgos Dispatchable y SerializesModels para el evento.

    public $user;  // Propiedad pública que almacena la instancia del modelo User relacionado con la acción.
    public $action;  // Propiedad pública que almacena detalles sobre la acción.

    /**
     * Create a new event instance.
     *
     * @param  User  $user  // Parámetro: instancia del modelo User relacionado con la acción.
     * @param  mixed  $action  // Parámetro: detalles sobre la acción que ha tenido lugar.
     * @return void
     */
    public function __construct(User $user, $action)
    {
        $this->user = $user;  // Almacena el usuario proporcionado en la propiedad $user.
        $this->action = $action;  // Almacena la acción proporcionada en la propiedad $action.
    }

}
