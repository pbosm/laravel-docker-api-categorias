<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id_categoria';

    protected $fillable = ['nome'];

    public function subcategorias()
    {
        return $this->hasMany(Subcategorias::class, 'id_categoria_pai', 'id_categoria');
    }
}
