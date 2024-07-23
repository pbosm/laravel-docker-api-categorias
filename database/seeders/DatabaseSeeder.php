<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Categorias;
use App\Models\Subcategorias;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('123')
        ]);

        \App\Models\Categorias::factory(10)->create();

        \App\Models\Subcategorias::factory(10)->create([
            'id_categoria_pai' => function() {
                return Categorias::inRandomOrder()->first()->id_categoria;
            }
        ]);
    }
}
