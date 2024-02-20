<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Perfil;
use App\Models\User;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "clientes";
    protected $primaryKey = "id";
    protected $fillable = [
        'perfil_id',
        'user_id',
        'ci' => "0",
    ];
    public function perfil(){
        return $this->belongsTo(Perfil::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}