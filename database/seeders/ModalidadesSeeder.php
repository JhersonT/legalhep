<?php

namespace Database\Seeders;

use App\Models\Modality;
use Illuminate\Database\Seeder;

class ModalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modality::create([
            'name'=> 'Chat',
            'image'=>'img/chat.png',
            'price'=> '20.00',
            "type"=> 1
        ]);

        Modality::create([
            'name'=> 'Videollamada',
            'image'=>'img/fame.png',
            'price'=> '20.00',
            "type"=> 1
        ]);

        Modality::create([
            'name'=> 'Presencial',
            'image'=>'img/presencial.svg',
            'price'=> '20.00',
            "type"=> 1
        ]);

        Modality::create([
            'name'=> 'Abogado de Emergencia',
            'image'=>'',
            'price'=> '20.00',
            "type"=> 2
        ]);

        Modality::create([
            'name'=> 'Documentos',
            'image'=>'',
            'price'=> '20.00',
            "type"=> 3
        ]);

        Modality::create([
            'name'=> 'Me Detuvieron',
            'image'=>'',
            'price'=> '150.00',
            "type"=> 4
        ]);

        Modality::create([
            'name'=> 'Me Chocaron',
            'image'=>'',
            'price'=> '100.00',
            "type"=> 4
        ]);

        Modality::create([
            'name'=> 'Otros',
            'image'=>'',
            'price'=> '50.00',
            "type"=> 4
        ]);

        Modality::create([
            'name'=> 'Minuta',
            'image'=>'',
            'price'=> '100.00',
            "type"=> 5
        ]);

        Modality::create([
            'name'=> 'Otros',
            'image'=>'',
            'price'=> '50.00',
            "type"=> 5
        ]);
        
    }
}
