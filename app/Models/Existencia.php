<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Almacen;
use App\Models\Item;

class Existencia extends Model
{
    use HasFactory;
    protected $table = "existencias";
    protected $primaryKey = "id";
    protected $fillable = [
        'item_id',
        'almacen_id',
        'existencia' => 0, 
        'existencia_maxima' => 0, 
        'existencia_minima' => 0,
    ];

    public function almacenes(){
        return $this->belongsToMany(Almacen::class);
    }

    public function items(){
        return $this->belongsToMany(Item::class, 'item_id');
    }
}