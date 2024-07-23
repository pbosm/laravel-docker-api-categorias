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
        \App\Models\User::factory(1)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User1',
            'email' => 'test1@example.com',
            'password' => Hash::make('123')
        ]);

        $this->call([
            CategoriasSeeder::class,
            SubcategoriasSeeder::class,
        ]);
    }
}
