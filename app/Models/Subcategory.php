<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable=[
        'categorie_id',
        'name',
        'requisitos',
        'image',
        'precio'
    ];

    public function categori()
    {
        return $this->hasOne(Category::class,'id',"categorie_id");
    }
}
