<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Detalhes do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    <header class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Detalhes do Usuário</h1>
            <a href="{{ route('home') }}" class="text-blue-500 hover:underline">
                ← Voltar para a lista
            </a>
        </div>
    </header>

    <main class="p-6 max-w-2xl mx-auto mt-8">
        <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-200">
            <h2 class="text-xl font-bold text-gray-800 mb-4">{{ $user->name }}</h2>

            <div class="space-y-2 text-sm text-gray-700">
                <p><span class="font-semibold">Email:</span> {{ $user->email }}</p>
                <p><span class="font-semibold">CEP:</span> {{ $user->cep }}</p>
                <p><span class="font-semibold">Logradouro:</span> {{ $user->logradouro }}</p>
                <p><span class="font-semibold">Número:</span> {{ $user->numero }}</p>
                <p><span class="font-semibold">Bairro:</span> {{ $user->bairro }}</p>
                <p><span class="font-semibold">Cidade:</span> {{ $user->localidade }}</p>
                <p><span class="font-semibold">UF:</span> {{ $user->uf }}</p>
            </div>
        </div>
    </main>

</body>

</html>
