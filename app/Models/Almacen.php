<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Existencia;

class Almacen extends Model
{
    use HasFactory;
    protected $table = "almacens";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'descripcion',
    ];
    public function almacenes(){
        return $this->belongsToMany(Existencia::class);
    }
}