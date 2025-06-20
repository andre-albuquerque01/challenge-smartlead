<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    <header class="bg-white shadow-md p-4 ">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Lista de Usuários</h1>
            <a href="{{ route('users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Novo Usuário
            </a>
        </div>
    </header>

    <main class="p-6 container mx-auto max-w-7xl">
        @if (session('message') == 'Usuário salvo com sucesso!')
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('message') }}
            </div>
        @elseif (session('message') == 'Usuário não foi salvo!')
            <div class="bg-red-100 text-yellow-800 p-4 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach ($users as $user)
                <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-200 hover:shadow-xl transition">
                    <div class="mb-4">
                        <h2 class="text-xl font-bold text-gray-800">{{ $user->name }}</h2>
                        <p class="text-gray-600 text-sm mt-1">
                            <span class="font-semibold">Email:</span> {{ $user->email }}
                        </p>
                        <p class="text-gray-600 text-sm">
                            <span class="font-semibold">CEP:</span> {{ $user->cep }}
                        </p>
                    </div>
                    <a href="{{ route('users.show', $user->id) }}"
                        class="inline-flex items-center gap-2 text-sm text-blue-600 hover:text-blue-800 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12H3m0 0l3.5 3.5M3 12l3.5-3.5" />
                        </svg>
                        Ver detalhes
                    </a>
                </div>
            @endforeach
        </div>
    </main>

</body>

</html>
