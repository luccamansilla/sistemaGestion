<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Dominio;
use Illuminate\Http\Request;

class DominioController extends Controller
{
    public function show(Request $request)
    {
        $dominios = Dominio::get();

        return view('dominios.show', compact('dominios'));
    }
    public function create(Request $request)
    {
        $clientes = Cliente::get();
        return view('dominios.create', compact('clientes'));
    }
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'nombre' => 'required',
            'vencimiento' => 'required',
        ], [
            'nombre.required' => 'El nombre del dominio es obligatorio',
            'vencimiento.required' => 'Debe ingresar la fecha de vencimiento del dominio',
        ]);
        $dominio = new Dominio;
        $dominio->nombre = $request->nombre;
        $dominio->titular_id = $request->titular;
        $dominio->cliente_id = $request->cliente;
        $dominio->dueño_id = $request->dueño;
        $dominio->observaciones = $request->observaciones;
        $dominio->estado = $request->estado;
        $dominio->fechaAlta = now();
        $dominio->fechaRegistro = $request->registro;
        $dominio->fechaVencimiento = $request->vencimiento;
        //dd($dominio);
        $dominio->save();
        return redirect()->route('dominio.show');
    }
}
