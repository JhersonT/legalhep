<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abogado extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "nombre",
        "apellido",
        "departamento",
        "email",
        "celular",
        "estado"
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
