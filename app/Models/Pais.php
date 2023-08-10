<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises'; // Nombre de la tabla en la base de datos a la que hace referencia el modelo.
    protected $fillable = ['codigo_iso', 'nombre']; // Atributos del modelo que pueden ser asignados en masa.
}
