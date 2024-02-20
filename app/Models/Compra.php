<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proveedor;
use App\Models\FormaPago;
use App\Models\Moneda;

class Compra extends Model
{
    use HasFactory;
    protected $table = "compras";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_creacion_id',
        'proveedor_id',
        'forma_pago_id' => 1,
        'moneda_id' => 1,
        'monto_total' => 0,
        'monto_descuento' => 0,
        'detalle',
        'estado' => "NO CREADO",
    ];
    public function user_creacion(){
        return $this->belongsTo(User::class,'user_creacion_id');
    }
    public function proveedor(){
        return $this->belongsTo(Proveedor::class,'proveedor_id');
    }
    public function formaPago(){
        return $this->belongsTo(FormaPago::class,'forma_pago_id');
    }
    public function moneda(){
        return $this->belongsTo(Moneda::class,'moneda_id');
    }
}