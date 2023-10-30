<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    //
    public function store($contactos, $cliente_id)
    {
        foreach ($contactos as $c) {
            $Con = Contacto::create([
                'cliente_id' => $cliente_id,
                'nombre' => $c['nombre'],
                'rol_id' => $c['rol'],
                'apellido' => $c['apellido'],
                'mail' => $c['mail'],
                'telefono' => $c['telefono'],
                'fechaNacimiento' => $c['nacimiento']
            ]);
            $Con->save();
        }
    }

    public function update(Request $request)
    {
        dd($request);
    }
}
