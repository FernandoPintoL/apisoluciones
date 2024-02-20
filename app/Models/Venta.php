<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Cliente;
use App\Models\FormaPago;
use App\Models\Moneda;
class Venta extends Model
{
    use HasFactory;
    protected $table = "ventas";
    protected $primaryKey = "id";
    protected $fillable = [
        'user_creacion_id',
        'cliente_id',
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
    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }
    public function formaPago(){
        return $this->belongsTo(FormaPago::class,'forma_pago_id');
    }
    public function moneda(){
        return $this->belongsTo(Moneda::class,'moneda_id');
    }
}