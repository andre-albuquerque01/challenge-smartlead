<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Criar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-800">

    <header class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Criar Novo Usuário</h1>
            <a href="{{ route('home') }}" class="text-blue-500 hover:underline">
                Voltar para a lista
            </a>
        </div>
    </header>

    <main class="p-4 max-w-2xl mx-auto bg-white shadow-xl rounded-2xl mt-4 border border-gray-200">
        <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nome</label>
                <input type="text" name="name" id="name"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            <div>
                <label for="cep" class="block text-sm font-semibold text-gray-700 mb-1">CEP</label>
                <input type="text" id="cep" name="cep"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            <div>
                <label for="logradouro" class="block text-sm font-semibold text-gray-700 mb-1">Rua</label>
                <input type="text" id="logradouro" name="logradouro" readonly
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Bairro:</label>
                <input type="text" id="bairro" name="bairro" readonly
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>

            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Cidade:</label>
                <input type="text" id="localidade" name="localidade" readonly
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Estado:</label>
                <input type="text" id="uf" name="uf" readonly
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>

            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Número:</label>
                <input type="text" id="numero" name="numero"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition cursor-pointer">
                Salvar Usuário
            </button>
        </form>
    </main>

</body>
<script>
    document.getElementById('cep').addEventListener('blur', function() {
        let cep = this.value.replace(/\D/g, '');
        console.log(cep);

        if (cep.length === 8) {
            fetch(`/consulta-cep/${cep}`)
                .then(response => response.json())
                .then(data => {
                    if (data.erro) {
                        alert('CEP não encontrado.');
                        return;
                    }
                    document.getElementById('logradouro').value = data.logradouro || '';
                    document.getElementById('bairro').value = data.bairro || '';
                    document.getElementById('localidade').value = data.localidade || '';
                    document.getElementById('uf').value = data.uf || '';
                })
                .catch(error => {
                    console.error(error);
                    alert('Erro ao buscar o CEP.');
                });
        }
    });
</script>

</html>
