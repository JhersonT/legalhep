<?php

namespace Database\Seeders;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'nombre'=>  "Amazonas",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Áncash",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Apurímac",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Apurímac",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Ayacucho",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Cajamarca",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Callao",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Cusco",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Huánuco",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Ica",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Junín",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "La Libertad",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Lambayeque",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Lima Metropolitana",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Lima (departamento)",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Loreto",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Madre de Dios",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Moquegua",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Pasco",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Piura",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Puno",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "San Martín",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Tacna",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Tumbes",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        Department::create([
            'nombre'=>  "Ucayali",
            'created_at'=> Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
