<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
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
        return view('clientes.create');
    }
}
