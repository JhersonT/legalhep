<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* User::create([
            'name'=> "Jherson Kayro Trigoso",
            'email'=> "jhersontrigoso14@gmail.com",
            'password'=> Hash::make("12345678"),
            'email_verified_at'=> Carbon::now()
        ]); */
    }
}
