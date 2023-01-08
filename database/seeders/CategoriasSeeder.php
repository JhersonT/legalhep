<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'Inmuebles'
        ]);

        Category::create([
            'name'=>'Poderes'
        ]);

        Category::create([
            'name'=>'Corporativo'
        ]);

        Category::create([
            'name'=>'Vehicular'
        ]);

        Category::create([
            'name'=>'SUNARP'
        ]);

        Category::create([
            'name'=>'Servicios'
        ]);
    }
}
