<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $table = "detalle_compras";
    protected $primaryKey = "id";
    protected $fillable = [
        "compra_id",
        "item_id",
        'cantidad' => 0,
        'sub_total' => 0,
    ];
}