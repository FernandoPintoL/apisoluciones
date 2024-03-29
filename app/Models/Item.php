<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = "items";
    protected $primaryKey = "id";
    protected $fillable = [
        'detalle',
        'photo_path',
        'precio_costo' => 0,
        'precio_venta' => 0,
        'isHabilitado' => true,
    ];
}