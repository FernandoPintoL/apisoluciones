<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $table = "perfils";
    protected $primaryKey = "id";
    protected $fillable = [
        'name' => "SOLUCIONES INFORMATICAS",
        'email' => "lpsoluciones@gmail.com",
        'direccion' => "C/ ISRRAEL MENDIA, #5",
        'celular' => "73682145",
        'photoUrl',
        'estado' => "NO CREADO"
    ];
}