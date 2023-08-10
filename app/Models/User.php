<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Foundation\Auth\User as Authenticatable; // Importa la clase Authenticatable para la autenticación de usuarios.
use Illuminate\Notifications\Notifiable; 
use Laravel\Sanctum\HasApiTokens; 

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'cell_number',
        'cedula',
        'birthdate',
        'city_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Define los eventos de modelo que deben despachar un evento de acción de usuario.
     *
     * @var array<string, string>
     */
    protected $dispatchesEvents = [
        'created' => \App\Events\UserActionEvent::class,
        'updated' => \App\Events\UserActionEvent::class,
        'deleted' => \App\Events\UserActionEvent::class,
    ];

    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;
}

