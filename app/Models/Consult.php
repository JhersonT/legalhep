<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "client_id",
        "modalidad",
        "tipo_pago",
        'numeroConsulta',
        "voucher",
        "titular",
        "monto",
        "pagado",
        "precio",
        "origen",
        "abogado_id",
        "servicio",
        "especialidad",
        "estado"
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function client()
    {
        return $this->hasMany(Client::class,'id','client_id');
    }

    public function observation()
    {
        return $this->hasMany(Observation::class,'consult_id','id');
    }

    public function abogado()
    {
        return $this->hasOne(Abogado::class,'id','abogado_id');
    }

}
