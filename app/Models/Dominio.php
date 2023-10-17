<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dominio extends Model
{
    use HasFactory;
    protected $table = 'dominios';

    public function historial()
    {
        return $this->hasMany(historial_dominio::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function dueño()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function titular()
    {
        return $this->belongsTo(Cliente::class);
    }
}
