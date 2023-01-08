<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::create([
            'categorie_id'=> 1,
            'name'=> 'Compra Venta',
            'precio'=> 20.00
        ]);

        Subcategory::create([
            'categorie_id'=> 1,
            'name'=> 'Donación',
            'precio'=> 25.00
        ]);

        Subcategory::create([
            'categorie_id'=> 1,
            'name'=> 'Anticipo de legitima',
            'precio'=> 20.00
        ]);

        Subcategory::create([
            'categorie_id'=> 1,
            'name'=> 'Mutuo con Garantia Hipotecaria / constitución de Hipoteca',
            'precio'=> 50.00
        ]);

        Subcategory::create([
            'categorie_id'=> 1,
            'name'=> 'Junta de Propietarios',
            'precio'=> 12.50
        ]);

        Subcategory::create([
            'categorie_id'=> 1,
            'name'=> 'Reglamento Interno',
            'precio'=> 25.00
        ]);

        Subcategory::create([
            'categorie_id'=> 1,
            'name'=> 'Independizaciones',
            'precio'=> 20.00
        ]);

        Subcategory::create([
            'categorie_id'=> 1,
            'name'=> 'Pre Inscripción Adquisitiva Inmueble',
            'precio'=> 50.00
        ]);
        /************************** */

        Subcategory::create([
            'categorie_id'=> 2,
            'name'=> 'Poder Amplio y General',
            'precio'=> 12.50
        ]);

        Subcategory::create([
            'categorie_id'=> 2,
            'name'=> 'Poder Especial',
            'precio'=> 12.50
        ]);

        Subcategory::create([
            'categorie_id'=> 2,
            'name'=> 'Poder fuera de Registro',
            'precio'=> 12.50
        ]);

        Subcategory::create([
            'categorie_id'=> 2,
            'name'=> 'Carta de Poder',
            'precio'=> 12.50
        ]);

        /************************** */
        Subcategory::create([
            'categorie_id'=> 3,
            'name'=> 'Constitución de Empresas',
            'precio'=> 50.00
        ]);
        Subcategory::create([
            'categorie_id'=> 3,
            'name'=> 'Aumento de Capital',
            'precio'=> 50.00
        ]);
        Subcategory::create([
            'categorie_id'=> 3,
            'name'=> 'Modificación de Estatutos',
            'precio'=> 50.00
        ]);

        Subcategory::create([
            'categorie_id'=> 3,
            'name'=> 'Delegación y Otorgamiento de Facultades',
            'precio'=> 50.00
        ]);

        Subcategory::create([
            'categorie_id'=> 3,
            'name'=> 'Registro de Marca Indecopi',
            'precio'=> 50.00
        ]);

        Subcategory::create([
            'categorie_id'=> 4,
            'name'=> 'Pre Inscripción Adquisitiva Vehicular',
            'precio'=> 20.00
        ]);

        Subcategory::create([
            'categorie_id'=> 4,
            'name'=> 'Permiso de Lunas Polarizadas',
            'precio'=> 20.00
        ]);

        Subcategory::create([
            'categorie_id'=> 5,
            'name'=> 'Reserva de Nombre',
            'precio'=> 20.00
        ]);
        Subcategory::create([
            'categorie_id'=> 5,
            'name'=> 'Copia Literal',
            'precio'=> 20.00
        ]);
        Subcategory::create([
            'categorie_id'=> 5,
            'name'=> 'Vigencia de Poder',
            'precio'=> 20.00
        ]);
        Subcategory::create([
            'categorie_id'=> 5,
            'name'=> 'Gravamen Vehicular',
            'precio'=> 20.00
        ]);
        Subcategory::create([
            'categorie_id'=> 5,
            'name'=> 'Busqueda de Titulo Archivado',
            'precio'=> 20.00
        ]);

        Subcategory::create([
            'categorie_id'=> 5,
            'name'=> 'Busqueda de Propiedades',
            'precio'=> 20.00
        ]);

        Subcategory::create([
            'categorie_id'=> 6,
            'name'=> 'Separación Convencional y Divorcio Ulterior',
            'precio'=> 80.00
        ]);
        Subcategory::create([
            'categorie_id'=> 6,
            'name'=> 'Sucesión Intestada',
            'precio'=> 80.00
        ]);
        Subcategory::create([
            'categorie_id'=> 6,
            'name'=> 'Ratificación de Partidas',
            'precio'=> 80.00
        ]);
        Subcategory::create([
            'categorie_id'=> 6,
            'name'=> 'Unión de Hecho',
            'precio'=> 80.00
        ]);
        Subcategory::create([
            'categorie_id'=> 6,
            'name'=> 'Cartas Notariales',
            'precio'=> 80.00
        ]);
        Subcategory::create([
            'categorie_id'=> 6,
            'name'=> 'Minutas',
            'precio'=> 80.00
        ]);
        Subcategory::create([
            'categorie_id'=> 6,
            'name'=> 'Antecedentes (Policiales,Judiciales,Penales)',
            'precio'=> 80.00
        ]);

    }
}
