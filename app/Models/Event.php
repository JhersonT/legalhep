<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable =[
        'abogado_id',
        'titulo',
        'fecha',
        'descripcion',
        'estado'
    ];

    public function abogado()
    {
        return $this->hasOne(Abogado::class,'id','abogado_id');
    }
}
