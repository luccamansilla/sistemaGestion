<?php

namespace App\Http\Controllers;

use App\Models\Historial_dominio;
use Illuminate\Http\Request;

class HistorialDominioController extends Controller
{
    //
    public function create($idDominio, $accion, $usuario)
    {
        $historial = Historial_dominio::create([
            'dominio_id' => $idDominio,
            'accion' => $accion,
            'usuario' => strval($usuario),
        ]);
        $historial->save();
    }
}
