<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;

class UbicationController extends Controller
{
    public function obtenerPaises()
    {
        $paises = Pais::all();

        $response = [];
        foreach ($paises as $pais) {
            $response[] = [
                'id' => $pais->id,
                'nombre' => $pais->nombre,
            ];
        }

        return response()->json($response);
    }

    public function obtenerDepartamentos($pais)
    {
        $departamentos = Departamento::where('pais', $pais)->get();
    
        $response = [];
        foreach ($departamentos as $departamento) {
            $nombre = mb_convert_case($departamento->nombre, MB_CASE_TITLE, 'UTF-8'); // Convertir primera letra mayúscula y el resto minúscula, manteniendo tildes
            $response[] = [
                'id' => $departamento->id,
                'nombre' => $nombre,
            ];
        }
    
        return response()->json($response);
    }
    

    public function obtenerMunicipios($departamento)
    {
        $municipios = Municipio::where('departamento', $departamento)->get();

        $response = [];
        foreach ($municipios as $municipio) {
            $response[] = [
                'id' => $municipio->id,
                'nombre' => $municipio->municipio,
            ];
        }

        return response()->json($response);
    }

}
