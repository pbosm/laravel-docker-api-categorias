<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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

        $categorias = [
            'categoria1',
            'categoria2',
            'categoria3',
            'categoria4',
            'categoria5',
            'categoria6',
            'categoria7',
            'categoria8',
            'categoria9',
            'categoria10'
        ];

        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert([
                'nome' => $categoria,
            ]);
        }

        \App\Models\Subcategorias::factory(10)->create([
            'id_categoria_pai' => function() {
                return Categorias::inRandomOrder()->first()->id_categoria;
            }
        ]);
    }
}
