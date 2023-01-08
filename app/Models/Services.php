<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        "subcategorie_id",
        "name",
        "precio",
        "image",
    ];

    public function subcategorie()
    {
    return $this->hasMany(Subcategory::class,"id","subcategorie_id");
    }
}
