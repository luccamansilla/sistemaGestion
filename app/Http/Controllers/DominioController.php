<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Dominio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function edit($idDominio)
    {
        $dominio = Dominio::find($idDominio);
        $clientes = Cliente::get();
        return view('dominios.edit', compact('clientes', 'dominio'));
    }
    public function store(Request $request, HistorialDominioController $historialController)
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
        $historialController->create($dominio->id, "INSERT", Auth::user()->id);
        return redirect()->route('dominio.show');
    }
    public function update(Request $request, Dominio $dominio, HistorialDominioController $historialController)
    {
        $request->validate([
            'nombre' => 'required',
            'vencimiento' => 'required',
        ], [
            'nombre.required' => 'El nombre del dominio es obligatorio',
            'vencimiento.required' => 'Debe ingresar la fecha de vencimiento del dominio',
        ]);
        $dominio->update([
            'nombre' => $request->nombre,
            'titular_id' => $request->titular,
            'cliente_id' => $request->cliente,
            'dueño_id' => $request->dueño,
            'observaciones' => $request->observaciones,
            'estado' => $request->estado,
            'fechaRegistro' => $request->registro,
            'fechaVencimiento' => $request->vencimiento,
        ]);
        $dominio->save();
        $historialController->create($dominio->id, "UPDATE", Auth::user()->id);
        return redirect()->route('dominio.show');
    }
}
