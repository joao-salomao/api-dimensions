## Configurando ambiente

### Pré-requisitos

-   PHP: ^7.2.5 | ^8.0
-   MySQL 8
-   Composer

### Configuração

Instalar as dependências do projeto executando o seguinte comando na raiz do projeto:

```bash
composer install
```

Configurar a conexão com o banco de dados no arquivo .env definindo o valor das seguintes variáveis:

-   DB_HOST
-   DB_PORT
-   DB_DATABASE
-   DB_USERNAME
-   DB_PASSWORD

Execute as migrações para criar as tabelas no banco de dados através do seguinte comando:

```bash
php artisan migrate
```

Executar o servidor de desenvolvimento usando o seguinte comando:

```bash
php artisan serve
```

## Testes
Execute os testes de integração usando o seguinte comando:
```bash
./vendor/bin/phpunit tests/Integration  --testdox
```
