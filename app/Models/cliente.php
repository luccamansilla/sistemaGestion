<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $fillable = ['nombre', 'razonSocial', 'email', 'dni', 'telefono', 'cuil', 'estado'];

    public function dominios()
    {
        return $this->hasMany(Dominio::class);
    }
    public function contactos()
    {
        return $this->hasMany(Contacto::class);
    }
}
