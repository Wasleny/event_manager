# Events Manager

Esse projeto visa criar um sistema de gerenciamento de eventos e inscrições, com CRUD de eventos e inscrições, além de autenticação de usuários.


## Como rodar esse projeto

### Pré-requisitos
- ter Docker instalado na máquina
- ter composer instalado na máquina

### Comandos
- Para subir a aplicação, execute o comando: `./vendor/bin/sail up`
- Para rodar estilização, execute o comando: `./vendor/bin/sail npm run dev`
- Para criar as tabelas, execute o comando: `./vendor/bin/sail artisan migrate --seed`


### Configurações
- Para poder fazer os testes dos emails, realizar a configuração no .env dos campos abaixo, conforme necessário:
    - MAIL_MAILER
    - MAIL_HOST
    - MAIL_PORT
    - MAIL_USERNAME
    - MAIL_PASSWORD
    - MAIL_ENCRYPTION
    - MAIL_FROM_ADDRESS
    - MAIL_FROM_NAME
