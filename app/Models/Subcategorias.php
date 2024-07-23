<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id_subcategoria';

    protected $fillable = ['id_categoria_pai'];

    public function categorias()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria_pai', 'id_categoria');
    }
}
