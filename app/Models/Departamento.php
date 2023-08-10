<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos'; // Nombre de la tabla en la base de datos a la que hace referencia el modelo.
    protected $fillable = ['nombre', 'pais']; // Atributos del modelo que pueden ser asignados en masa.

    /**
     * Define la relación con el modelo 'Pais'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais'); // Establece una relación "pertenece a" con el modelo 'Pais'.
    }
}
