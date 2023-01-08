<?php

namespace Database\Seeders;

use App\Models\Support;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        $this->call([
            DepartamentosSeeder::class,
            UserSeeder::class,
            ModalidadesSeeder::class,
            CouponsSeeder::class,
            LinksSeeder::class,
            SoporteTecnicoSeeder::class,
            CategoriasSeeder::class,
            SubcategoriasSeeder::class,
            StateSeeder::class,
            RoleSeeder::class
        ]);
    }
}
