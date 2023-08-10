<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios'; // Nombre de la tabla en la base de datos a la que hace referencia el modelo.
    protected $fillable = ['municipio', 'estado', 'departamento']; // Atributos del modelo que pueden ser asignados en masa.

    /**
     * Define la relación con el modelo 'Departamento'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento'); // Establece una relación "pertenece a" con el modelo 'Departamento'.
    }
}
