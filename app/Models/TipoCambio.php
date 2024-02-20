<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Moneda;

class TipoCambio extends Model
{
    use HasFactory;
    protected $table = "tipo_cambios";
    protected $primaryKey = "id";
    protected $fillable = [
        'tipo_cambio',
        'user_creacion_id',
        'moneda_id' => 1,
    ];
    public function user_creacion(){
        return $this->belongsTo(User::class, 'user_creacion_id');
    }
    public function moneda(){
        return $this->belongsTo(Moneda::class, 'moneda_id');
    }
}