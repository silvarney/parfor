<h1>
    Parfor - Ufra
<h1>

## Instalação

É necessário ter instalado o Composer 2.0, PHP e MYSQL.

- Clonar o repositório:
git clone https://github.com/silvarney/parfor.git

- Atualizar as dependências: 
composer update

- Criar o banco de dados e deixar em branco.

- Criar copiar o arquivo ".env.example" e renomear para ".env".

- No arquivo ".env", alterar os parametros:
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha

- Rodar as migrates(criação das tabelas):
php artisan migrate

- Criar os usuários padrões:
php artisan db:seed

- Usuário Admin:
email: admin@parfor.com
senha: 123456

- Gerar a chave da aplicação:
php artisan key:generate

- Iniciar o servidor local:
php artisan serve
