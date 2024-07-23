<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Subcategorias;

class SubcategoriasController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_categoria_pai' => 'required'
        ]);

        $subcategoria = Subcategorias::create($request->only('id_categoria_pai'));

        return response()->json(['message' => 'Subcategoria criado com sucesso!'], 201);
    }

    public function destroy($id)
    {
        $subcategoria = Subcategorias::find($id);

        if (!$subcategoria) {
            return response()->json(['error' => 'Subcategoria não encontrada'], 404);
        }

        $subcategoria->delete();

        return response()->json(['message' => 'Subcategoria excluída com sucesso']);
    }
}
