<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {


            Animal::create([
                'nome' => 'Ambrozio' . $i,
                'idade' => 5,
                'especie' => 'Macaco',
                'ra' => 'RA123245' . $i,
                'peso' => 30.5,
                'altura' => 60,
                'sexo' => 'Macho',
                'dieta' => 'Alimentos comestiveis',
                'habitat' => 'Casa'
            ]);
        }
    }
}
