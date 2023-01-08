<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'codigo'=> 'xsad1',
            'porcentaje'=> 32,
            'usado'=> false
        ]);

        Coupon::create([
            'codigo'=> 'asewq',
            'porcentaje'=> 20,
            'usado'=> false
        ]);
    }
}
