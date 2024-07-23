<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categorias::with('subcategorias')->get();
        
        return response()->json($categorias);
    }

    public function show($id)
    {
        $categoria = Categorias::with('subcategorias')->find($id);

        if (!$categoria) {
            return response()->json(['error' => 'Categoria não encontrada'], 404);
        }

        return response()->json($categoria);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required|string|unique:categorias'
            ]);
    
            $categoria = Categorias::create($request->only('nome'));
    
            return response()->json(['message' => 'Categoria ' . $categoria->nome . ' criada com sucesso!'], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function destroy($id)
    {
        $categoria = Categorias::find($id);

        if (!$categoria) {
            return response()->json(['error' => 'Categoria não encontrada'], 404);
        }

        $categoria->delete();

        return response()->json(['message' => 'Categoria excluída com sucesso'], 201);
    }
}
