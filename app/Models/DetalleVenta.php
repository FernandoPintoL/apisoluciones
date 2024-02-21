<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table = "detalle_ventas";
    protected $primaryKey = "id";
    protected $fillable = [
        "venta_id",
        "item_id",
        'cantidad' => 0,
        'sub_total' => 0,
    ];
}