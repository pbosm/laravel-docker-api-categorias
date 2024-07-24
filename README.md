
# Caminho feliz local

Uma breve descrição sobre como rodar esse projeto localmente com docker 

- Faça o git clone desse repositório
- Entre na pasta do repositório - cd local do projeto
- No terminal, dê um - sudo docker compose up
- Entre no container, docker exec -it laravel-lojacorr bash, dentro dele, dê um cp .env.example .env e composer install
- Rode os seguintes comandos; 
    * php artisan key:generate 
    * php artisan migrate
    * php artisan db:seed
    * php artisan cache:clear
    * php artisan config:cache
- Rode os testes unitarios - php artisan test
- Probleminha de lógica a resposta está no arquivo exerciocioLogica.php

# Documentação API  
Usando postman ou outra ferramenta semelhante teste as API

#### Rota register 

```http
  POST  http://localhost:8080/api/register
```
| key   | value       | Headers                                   |
| :---------- | :--------- | :------------------------------------------ |
| `name`      | Novo Usuário | Content-type ->application/json |
| `email`     | novo_usuario@example.com | Content-type ->application/json |
| `password`  | senha_secreta | Content-type ->application/json |
| `password_confirmation`  | senha_secreta | Content-type ->application/json |


#### Rota login

```http
  POST  http://localhost:8080/api/login
```

| key   | value       | Headers                                   |
| :---------- | :--------- | :------------------------------------------ |
| `email`     | novo_usuario@example.com | Content-type ->application/json |
| `password`  | senha_secreta | Content-type ->application/json |

#### Efetuando o register ou login, será retornado o token, que deverá ser usando no header authorization

#### Rota Categoria, seleciona todas

```http
  GET  http://localhost:8080/api/categorias
```
| Headers        | Value        |
| :------------- | :----------- |
| Authorization  | Bearer token |

#### Rota Categoria, seleciona pelo id_categoria

```http
  GET  http://localhost:8080/api/categorias/{id_categoria}
```
| Key           | Headers        | Bearer    |
| :------------ | :------------- | :------- |
| id_categoria  | Authorization  | {token}  |

#### Rota Categoria, criando categoria

```http
  POST  http://localhost:8080/api/categorias
```
| Key  | Value        | Headers        | Bearer  |
| :--- | :------------- | :----------- | :------------- |
| nome | Nova categoria  | Authorization |     {token}           |

#### Rota Categoria, excluir por id_categoria

```http
  DELETE  http://localhost:8080/api/categorias
```
| Key           | Headers        | Bearer    |
| :------------ | :------------- | :------- |
| id_categoria  | Authorization  | {token}  |





