## Descrição

Aplicativo RESTful para Criar, Visualizar, Atualizar e Remover Contatos com Laravel 8 utilizando o Passport para autenticação da API.

## Instalação

```bash
$ git clone https://github.com/adevecchi/laravel-auth-rest-api.git

$ cd laravel-auth-rest-api

$ composer install
```

Renomear ou copiar o arquivo **.env.example** para **.env**

Criar um bando de dados no MySQL, exemplo: **CREATE DATABASE rest_api_laravel;**

Configurar o arquivo **.env** conforme mostrado abaixo:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rest_api_laravel
DB_USERNAME=<seu_nome_de_usuario>
DB_PASSWORD=<sua_senha_de_acesso>
```

Executar o comando para criar as tabelas no banco de dados:

```bash
$ php artisan migrate
```

Gerar a **key** do laravel:

```bash
$ php artisan key:generate
```

Instalar o passpot, para gerar as chaves de criptografia necessarias para criar os tokens de acesso:

```bash
$ php artisan passport:install
```

Iniciar o servidor:

```bash
$ php artisan serve
```

## Endpoints

* Registra usuário: `POST /api/register`

![Registra usuário](https://github.com/adevecchi/laravel-auth-rest-api/blob/main/public/images/register.png)

---

* Login: `POST /api/login`

![Login](https://github.com/adevecchi/laravel-auth-rest-api/blob/main/public/images/login.png)

---

* Todos contatos: `GET /api/contacts`

![Todos contatos](https://github.com/adevecchi/laravel-auth-rest-api/blob/main/public/images/get-all.png)

---

* Contato por Id: `GET /api/contacts/{id}`

![Contato por id](https://github.com/adevecchi/laravel-auth-rest-api/blob/main/public/images/get-id.png)

---

* Cria contato: `POST /api/contacts`

![Cria contato](https://github.com/adevecchi/laravel-auth-rest-api/blob/main/public/images/create.png)

---

* Atualiza contato: `PUT /api/contacts/{id}`

![Atualiza contato](https://github.com/adevecchi/laravel-auth-rest-api/blob/main/public/images/update.png)

---

* Exclui contato: `DELETE /api/contacts/{id}`

![Exclui contato](https://github.com/adevecchi/laravel-auth-rest-api/blob/main/public/images/delete.png)
