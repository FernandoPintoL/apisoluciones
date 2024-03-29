<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Perfil;
use App\Models\User;

class Empresa extends Model
{
    use HasFactory;
    protected $table = "empresas";
    protected $primaryKey = "id";
    protected $fillable = [
        'perfil_id',
        'user_id',
        'propietario',
        'nit' => "0",
        'razon_social' => "S/N",
    ];
    public function perfil(){
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}