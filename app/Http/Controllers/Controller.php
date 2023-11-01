<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Dominio;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        $dominios = Dominio::orderBy("fechaVencimiento", "asc")->get();
        $clientes = Cliente::all();
        return view("dashboard", compact('dominios', 'clientes'));
    }
}
