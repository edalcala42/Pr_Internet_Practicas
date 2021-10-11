<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 
        'user_id',
        'apellido_paterno',
        'apellido_materno',
        'identificador',
        'correo',
        'telefono'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
