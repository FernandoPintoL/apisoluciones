<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Perfil;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = "proveedors";
    protected $primaryKey = "id";
    protected $fillable = [
        'perfil_id',
        'propietario',
        'nit' => "0",
        'razon_social' => "S/N",
    ];
    public function perfil(){
        return $this->belongsTo(Perfil::class,'perfil_id');
    }
}