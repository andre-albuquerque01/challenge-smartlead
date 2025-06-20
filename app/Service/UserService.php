<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Http;

class UserService
{
    public function index()
    {
        try {
            return User::all();
        } catch (\Exception $e) {
            return null;
        }
    }

    public function show(int $id)
    {
        try {
            return User::find($id);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function store(array $data)
    {
        try {
            User::create($data);
            return "Usuário salvo com sucesso!";
        } catch (\Exception $e) {
            return "Usuário não foi salvo!";
        }
    }

    public function buscar($cep)
    {
        $cep = preg_replace('/\D/', '', $cep);

        if (strlen($cep) !== 8) {
            return response()->json(['erro' => 'CEP inválido'], 422);
        }

        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->successful() && !$response->json('erro')) {
            return response()->json($response->json());
        }

        return response()->json(['erro' => 'CEP não encontrado'], 404);
    }
}
