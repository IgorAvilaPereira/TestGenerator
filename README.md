# Test Generator

Aplicação web para criação e gerenciamento de testes.
Permite adicionar questões, categorizá-las com tags e gerar testes com base em um número especificado de perguntas.

## Funcionalidades

* **Adicionar Questões**: Facilita a inclusão de perguntas no sistema.
* **Sistema de Tags**: Categoriza questões usando tags para melhor organização.
* **Geração de Testes**: Gera testes selecionando a quantidade desejada de perguntas.
* **Interface Web**: Interface amigável para gerenciamento de questões e geração de testes.

## Tecnologias Utilizadas

* **PHP 8.1.2**: Linguagem de script do lado servidor.
* **PostgreSQL 14.5**: Sistema de gerenciamento de banco de dados.
* **php-pgsql**: Extensão PHP para PostgreSQL.
* **Templates**: Motor de templates para renderização das views.
* **Bootstrap**: Framework front-end para design responsivo.
* **jQuery**: Biblioteca JavaScript para manipulação do DOM.

## Instalação

1. **Restaurar o Dump do Banco de Dados**:

   No terminal, execute os comandos:

   ```bash
   psql -h localhost -U postgres
   \i dumps/test_generator01052023.sql
   ```

2. **Iniciar a Aplicação**:

   Execute o script para iniciar a aplicação:

   ```bash
   ./start.sh
   ```

3. **Acessar a Aplicação**:

   Abra o navegador e acesse:

   ```
   http://localhost:8081
   ```

## Ambiente de Desenvolvimento

Esta aplicação foi desenvolvida no Linux Mint 21 x86\_64.

## Licença

Este projeto está licenciado sob a licença MIT.
