# Projeto em para desafio da smartlead

Este repositório contém uma aplicação Laravel que utiliza o Laravel Sail como ambiente de desenvolvimento baseado em Docker. Ele inclui integração com Vite para assets modernos, testes automatizados com PHPUnit e manipulação de banco de dados.

## 🚀 Pré-requisitos

- Docker instalado
- Docker Compose
- Node.js e npm instalados

---

## ⚙️ Subindo o projeto com Docker (Laravel Sail)

Clone o repositório:

```bash
git clone https://github.com/andre-albuquerque01/challenge-smartlead.git
cd challenge-smartlead
```

Inicialize os pacotes do Laravel:

```php
composer install
```

Crie um arquivo `.env` na raiz do seu projeto e configure as variáveis de ambiente conforme necessário.
Execute `php artisan config:cache` para aplicar as configurações do arquivo `.env`.

Inicie o servidor:

```bash
./vendor/bin/sail up -d
```

Para desativar o servidor:

```bash
./vendor/bin/sail down
```

Gere a chave da aplicação:

```bash
./vendor/bin/sail artisan key:generate
```

Banco de dados

O Laravel Sail já sobe um container com MySQL configurado.

Os dados de conexão estão definidos no arquivo .env.

A conexão padrão geralmente é:

```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=challenge_smartlead
DB_USERNAME=sail
DB_PASSWORD=password
```

Inicialize o banco de dados:

```bash
./vendor/bin/sail artisan migrate
```

Rodar os teste:

```bash
./vendor/bin/sail artisan test
```

Rodando o Vite

```bash
npm install
npm run dev
```

<section>
  <h2>📝 Informações adicionais</h2>
  <ul>
    <li>As rotas estão definidas em <code>routes/web.php</code>.</li>
    <li>O projeto utiliza <code>Http::get()</code> para consultar o ViaCEP.</li>
    <li>Os testes incluem criação de usuários, consulta de CEP, e verificação de views.</li>
  </ul>
</section>

<section>
  <h2>🧑‍💻 Autor</h2>
  <ul>
    <li>Nome: André</li>
    <li>LinkedIn: <a href="https://www.linkedin.com/in/andre-albuquerque-ae001" target="_blank" rel="noopener">Linkedin</a></li>
    <li>GitHub: <a href="https://github.com/andre-albuquerque01" target="_blank" rel="noopener">Github</a></li>
  </ul>
</section>
