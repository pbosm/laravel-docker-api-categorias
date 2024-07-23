<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Categorias;
use App\Models\User;
use Tests\TestCase;

class CategoriasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function indexTest(): void
    {
        $user  = User::factory()->create();
        $token = $user->createToken('Test Token')->plainTextToken;

        // Cria 10 categorias de teste no banco de dados
        Categorias::factory()->count(10)->create();

        $response = $this->withHeaders([
            'Authorization' => "Bearer $token",
        ])->get('/api/categorias');

        $response->assertStatus(200);

        $response->assertJsonCount(10);
    }

    public function testShow()
    {
        $user  = User::factory()->create();
        $token = $user->createToken('Test Token')->plainTextToken;
        
        $categorias = Categorias::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => "Bearer $token",
        ])->get("/api/categorias/{$categorias->first()->id_categoria}");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id_categoria',
            'nome',
        ]);

        //categoria inexistente
        $response = $this->getJson('/api/categorias/9999');
        $response->assertStatus(404);
        $response->assertJson(['error' => 'Categoria não encontrada']);
    }

    public function testStore()
    {
        $user  = User::factory()->create();
        $token = $user->createToken('Test Token')->plainTextToken;
        
        $dataVazio = [
            'nome' => ''
        ];

        $data = [
            'nome' => 'Categoria testStore'
        ];

        $responseVazio = $this->withHeaders([
            'Authorization' => "Bearer $token",
        ])->post('/api/categorias', $dataVazio);
        $responseVazio->assertStatus(422);

        $response = $this->withHeaders([
            'Authorization' => "Bearer $token",
        ])->post('/api/categorias', $data);
        $response->assertStatus(201);

        $categoriaExist = Categorias::where('nome', 'Categoria testStore')->exists();
        $this->assertTrue($categoriaExist);
    }

    public function testDestroy()
    {
        $user  = User::factory()->create();
        $token = $user->createToken('Test Token')->plainTextToken;

        $categorias = Categorias::factory()->create();

        $responseEmpty = $this->withHeaders([
            'Authorization' => "Bearer $token",
            ])->delete("/api/categorias/999999");
        $responseEmpty->assertStatus(404);
        
        $response = $this->withHeaders([
            'Authorization' => "Bearer $token",
            ])->delete("/api/categorias/{$categorias->first()->id_categoria}");
        $response->assertStatus(201);
    }
}