<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::updateOrCreate([
            'nombre'=> 'Ingresado'
        ]);
        State::updateOrCreate([
            'nombre'=> 'En Calificación'
        ]);
        State::updateOrCreate([
            'nombre'=> 'Observado'
        ]);
        State::updateOrCreate([
            'nombre'=> 'Liquidado'
        ]);
        State::updateOrCreate([
            'nombre'=> 'Suspendido'
        ]);

        State::updateOrCreate([
            'nombre'=> 'Culminado'
        ]);

        State::updateOrCreate([
            'nombre'=> 'Pagado'
        ]);

        State::updateOrCreate([
            'nombre'=> 'Pendiente'
        ]);

        State::updateOrCreate([
            'nombre'=> 'Otro'
        ]);

    }
}
