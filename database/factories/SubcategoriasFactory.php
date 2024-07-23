<?php

namespace Database\Factories;

use App\Models\Subcategorias;
use App\Models\Categorias;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoriasFactory extends Factory
{
    protected $model = Subcategorias::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'id_categoria_pai' => Categorias::factory(),
        ];
    }
}
