<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Roles;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
    public function show(Request $request)
    {
        $clientes = Cliente::get();

        return view('clientes.show', compact('clientes'));
    }
    public function create(Request $request)
    {
        $roles = Roles::all();
        return view('clientes.create', compact('roles'));
    }

    public function store(Request $request, ContactoController $contactoController)
    {
        //dd($request);
        //Obtengo el json y lo paso de vuelta a array
        $request->validate([
            'nombre' => 'required',
            'razonSocial' => 'required',
            'email' => 'required',
            'dni' => 'required',
            'cuil' => 'required',
            'telefono' => 'required',
        ], [
            'nombre.required' => 'El nombre del cliente es obligatorio.',
            'razonSocial.required' => 'Debe ingresar la razon social del cliente',
            'email.required' => 'Debe ingresar el email del cliente',
            'dni.required' => 'Debe ingresar el dni del cliente',
            'cuil.required' => 'Debe ingresar el cuil del cliente',
            'telefono.required' => 'Debe ingresar el número de telefono del cliente',
        ]);
        $cliente = Cliente::create([
            'nombre' => $request->nombre,
            'razonSocial' => $request->razonSocial,
            'email' => $request->email,
            'dni' => $request->dni,
            'cuil' => $request->cuil,
            'telefono' => $request->telefono,
            'estado' => $request->estado,
        ]);
        $cliente->save();
        //TO DO -- verificacion que tenga al menos uno
        $contactos = json_decode($request->clientesArray, true);
        if (!empty($contactos)) {
            $contactoController->store($contactos, $cliente->id);
        }
        return redirect()->route('cliente.show');
    }
}
