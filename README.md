
# Instruções

### Passo a passo
Clone Repositório
```sh
git clone git@github.com:aleexbaratieri/tests-mn.git laravel
```

```sh
cd laravel
```

Crie o Arquivo .env
```sh
cp .env.example .env
```

Suba os containers do projeto
```sh
docker-compose up -d
```


Acessar o container
```sh
docker-compose exec mn-app bash
```

Instalar as dependências do projeto
```sh
composer install
```

Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Criação de tabelas e dados
```sh
php artisan migrate --seed
```

Acesse o projeto
[http://localhost:8989/api/](http://localhost:8989/api/)


Rodar testes
```sh
touch database/database.sqlite
```
```sh
php artisan test
```