# PROJETO CRUD COM PHP

# CRUD DE ESCOLAS

Aplicação web do tipo monolitica criada com:
- PHP para o backend, ^7.4
- HTML, CSS e Javascript pro frontend
- MySQL/MaraDB para o banco de dados

## Funcinalidades
- CRUD de Alunos
- CRUD de Professores
- CRUD de Cursos
- CRUD de Categorias
- CRUD de Usuários

## Passo a passo para rodar o projeto
Certifique-se que seu computador tem os software
- PHP
- MySQL ou MariaDB
- Editor de texto (por exemplo VS code)
- Navegador Web
- Composer (Gerenciador de pacotes do PHP)

### Clone o projeto
Baixe ou faça o clone do repositorio:
`git clone {URL do repositorio}`

Após isso, entre no diretorio que foi gerado
`cd crud-php-oo`

#### Habilitar as extensões do php
Abra o diretório de instalação do PHP, encontro o arquivo *php.ini-production*, renomie-o para *php.ini* e abra-o com algum de editor de texto.

Encontro as seguintes linhas e descomentes-as, removendo: que precede a linha.

- pdo_mysql
- curl
- mb_string
- openssl

#### Instalar as dependencias
Dentro do diterório da aplicação execute no terminal:
`composer install`

Certifique-se que um diretório chamado **/vendor** foi criado.

#### Banco de Dados

> O banco de dados é do tipo relacional e contém as tabelas com té 2 níveis de normatizaçãp.

...

#### Criando o banco de dados
Entre no seu cliente de banco de dados, e execute o comando:
```sql
CREATE DATABASE db_escola;
```

#### Migrar a estrutura do banco de dados
Ainda dentro do cliente de banco de dados, copie e cole o conteúdo do arquivo **db.sql** e execute.

Certifique-se que as tabelas foram criadas, executando o comando:

```sql
SHOW TABLES;
```

Se o resultado for a lista de tabelas existentes, então pronto!

### Configure as credenciais de acesso
Encontre o arquivo **/config/database.php** e edite-o conforme as credenciais do seu usuário do banco de dados.

### Crie o primeiro usuário de acesso
Dentro do diretório da aplicação, execute no terminal o comando
`php config/create-admin.php`;

Isso criará um usuário com as credencias:
|Nome|Email|Senha|
| -  |  -  |  -  |
| Adiministrador | admin@admin.com | 1234 |

...

### Execute a aplicação
Parr executar e testar a aplicação, dentro do terminal execute:
`php -S localhost:8000 -t public`

Agora acesse o endereço http://localhost:8000/login em seu navegador.