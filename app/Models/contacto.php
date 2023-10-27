<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    protected $table = 'contactos';
    protected $fillable = ['cliente_id', 'rol_id', 'nombre', 'apellido', 'mail', 'telefono', 'fechaNacimiento'];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function rol()
    {
        return $this->belongsTo(Roles::class);
    }
}
