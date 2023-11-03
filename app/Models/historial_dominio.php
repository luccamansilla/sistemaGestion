<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial_dominio extends Model
{
    use HasFactory;
    protected $table = 'historial_dominios';

    protected $fillable = ['dominio_id', 'accion', 'usuario'];

    public function dominio()
    {
        return $this->belongsTo(Dominio::class);
    }
}
