# Events Manager

Esse projeto visa criar um sistema de gerenciamento de eventos e inscrições, com CRUD de eventos e inscrições, além de autenticação de usuários.

## Como rodar esse projeto

### Pré-requisitos

-   ter Docker instalado na máquina
-   ter o composer instalado na máquina

### Comandos

-   Clonar o projeto do github
-   Execute o comando `composer install` (precisa ter o composer instalado)
-   Execute o comando `npm install` (precisa ter o npm instalado) ou o comando `./vendor/bin/sail npm install` para instalar as dependências do projeto
-   Gerar arquivo .env
-   Rodar o comand `./vendor/bin/sail artisan key:generate` para gerar a chave de aplicativo
-   Para subir a aplicação, execute o comando: `./vendor/bin/sail up`
-   Para compilar os ativos do frontend, execute o comando: `./vendor/bin/sail npm run dev`
-   Para criar as tabelas com os dados gerados automaticamente, execute o comando: `./vendor/bin/sail artisan migrate --seed`
-   Para criar somente as tabelas, execute o comando: `./vendor/bin/sail artisan migrate`

### Usuário teste

-   email: `user@test.com`
-   senha: `user@123`

### Configurações

-   Para poder fazer os testes dos emails, realizar a configuração no .env dos campos abaixo, conforme necessário:
    -   MAIL_MAILER
    -   MAIL_HOST
    -   MAIL_PORT
    -   MAIL_USERNAME
    -   MAIL_PASSWORD
    -   MAIL_ENCRYPTION
    -   MAIL_FROM_ADDRESS
    -   MAIL_FROM_NAME
