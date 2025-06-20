<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    public function test_create()
    {
        $response = $this->get('/create');
        $response->assertStatus(200);
    }

    use RefreshDatabase;
    public function test_register()
    {
        $data = [
            "name" => "John doe",
            "email" => "john.doe@example.com",
            'cep' => '12345678',
            'logradouro' => 'Rua Exemplo',
            'bairro' => 'Bairro Exemplo',
            'localidade' => 'Cidade Exemplo',
            'uf' => 'EX',
            'numero' => '123',
        ];

        $response = $this->post('/users', $data);
        $response->assertRedirect(route('home'));
        $response->assertSessionHas('message', 'Usuário salvo com sucesso!');
    }

    public function test_show_user(): void
    {
        $user = User::factory()->create([
            "name" => "John doe",
            "email" => "john.doe@example.com",
            'cep' => '12345678',
            'logradouro' => 'Rua Exemplo',
            'bairro' => 'Bairro Exemplo',
            'localidade' => 'Cidade Exemplo',
            'uf' => 'EX',
            'numero' => '123',
        ]);

        $response = $this->get("/users/{$user->id}");

        $response->assertStatus(200);
        $response->assertSee($user->name);
        $response->assertSee($user->email);
        $response->assertSee($user->cep);
    }

    public function test_index(): void
    {
        $user = User::factory()->create([
            "name" => "John doe",
            "email" => "john.doe@example.com",
            'cep' => '12345678',
            'logradouro' => 'Rua Exemplo',
            'bairro' => 'Bairro Exemplo',
            'localidade' => 'Cidade Exemplo',
            'uf' => 'EX',
            'numero' => '123',
        ]);
        $response = $this->get("/");

        $response->assertStatus(200);
        $response->assertSee($user->name);
    }

    public function test_consulta_cep(): void
    {
        $response = $this->getJson("/consulta-cep/70713000");
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "cep" => "70713-000",
            "logradouro" => "Quadra SCN Quadra 3",
            "complemento" => "",
            "unidade" => "",
            "bairro" => "Asa Norte",
            "localidade" => "Brasília",
            "uf" => "DF",
            "estado" => "Distrito Federal",
            "regiao" => "Centro-Oeste",
            "ibge" => "5300108",
            "gia" => "",
            "ddd" => "61",
            "siafi" => "9701",
        ]);
    }
}
