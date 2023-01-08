<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'tipo_doc',
        'n_doc',
        'departamento',
        'nombres',
        'pass',
        'celular',
        'apellidos',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
