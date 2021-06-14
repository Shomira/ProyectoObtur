<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProvinciaCantonSeeder::class);

        User::create([
            'name' => 'Leonardo',
            'email' => 'mlaguilar@utpl.edu.ec',
            'password' => Hash::make('12345678'),
            'rol' => 'Administrador',
            'idCanton' => 105
        ]);

    }
}
