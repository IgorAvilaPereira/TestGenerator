# Test Generator

Sistema para a construção de testes/provas. Permite adicionar questões, classificar questões em tags e gerar provas/testes de acordo com uma quantidade de questões definidas pelo usuário.

## Requisitos:

* PHP 8.1.2
* PostgreSQL 14.5
* php-pgsql 
* [Templates](https://raelcunha.com/template/)
* Bootstrap
* jQuery
* Ajustar o __php.ini__ para receber arquivos via upload

## Instalação:

Restaurar ***dump*** no PostgreSQL:

No terminal:
```sh
psql -h localhost -U postgres
\i dumps/test_generator01052023.sql
```

Iniciar o Teacher Organizer:

No terminal:
```sh
./start.sh
```

Acessar http://localhost:8081

## Setup:

* Desenvolvido no Linux Mint 21 x86_64 
