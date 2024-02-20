<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Existencia;
use App\Models\User;

class Almacen extends Model
{
    use HasFactory;
    protected $table = "almacens";
    protected $primaryKey = "id";
    protected $fillable = [
        "user_creacion_id",
        "user_responsable_id",
        'name',
        'capacidad_maxima' => 0,
        'capacidad_minima' => 0,
        'estado' => "NO CREADO",
    ];
    public function existencias(){
        return $this->belongsToMany(Existencia::class);
    }
    public function user_creacion(){
        return $this->belongsTo(User::class,'user_creacion_id');
    }
    public function user_responsable(){
        return $this->belongsTo(User::class,'user_responsable_id');
    }
}