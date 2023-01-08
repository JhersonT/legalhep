<?php

namespace Database\Seeders;

use App\Models\Support;
use Illuminate\Database\Seeder;

class SoporteTecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Support::create([
            'titulo'=> 'Video Tutorial',
            'url'=> 'https://www.youtube.com/embed/dvxxTKcIYQ4'
        ]);
    }
}
