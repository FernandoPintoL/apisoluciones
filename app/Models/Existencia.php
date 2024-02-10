<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Almacen;

class Existencia extends Model
{
    use HasFactory;
    protected $table = "existencias";
    protected $primaryKey = "id";
    protected $fillable = [
        'stock',
        'item_id',
        'almacen_id',
    ];

    public function almacenes(){
        return $this->belongsToMany(Almacen::class);
    }
}