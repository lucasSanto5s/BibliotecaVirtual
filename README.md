# Projeto: Sistema de Biblioteca Virtual

## Disciplina: Tópicos Especiais em Programação

**Curso:** Ciência da Computação
**Professor:** Edinilson da Silva Vida
**Turma:** CC6 - 2024/
**Data de Entrega:** 21/02/

## Integrantes do Grupo

- **João Arbegaus** _(Product Owner)_
- **Carlos Ramon** _(Scrum Master)_
- **Caetano Casagrande** _(Desenvolvedor Frontend)_
- **Lucas dos Santos Borges** _(Desenvolvedor Backend - Banco de Dados)_
- **Kauan Koech** _(Full Stack & Responsável pelo Trello)_

## Descrição do Projeto

Este projeto tem como objetivo o desenvolvimento de um **Sistema de Gestão de Projetos**
utilizando os frameworks **Laravel** e **Blade**. A aplicação permite o gerenciamento de projetos,
tarefas e usuários, com funcionalidades de autenticação, CRUD, interface responsiva e
segurança contra vulnerabilidades comuns.
O projeto foi desenvolvido utilizando a metodologia **Scrum** , com organização das tarefas no
**Trello** e versionamento do código no **GitHub**.

## Funcionalidades Implementadas

- Cadastro de usuarios
- CRUD completo para usuários, projetos e tarefas.
- Interface responsiva com **Bootstrap**.
- Proteção contra **CSRF**.
- Validação de formulários com mensagens de erro amigáveis.


## Estrutura do Projeto

- **/app** : Controladores e modelos Laravel.
- **/resources/views** : Arquivos Blade para as views.
- **/public** : Arquivos estáticos (CSS, JS, imagens).
- **/database/migrations** : Scripts de criação das tabelas.
- **/routes/web.php** : Definição das rotas da aplicação.

## Tecnologias Utilizadas

- **Laravel 10.x** - Framework PHP
- **Blade** - Template engine do Laravel
- **MySQL** - Banco de dados relacional
- **Bootstrap 5** - Framework CSS para responsividade
- **GitHub** - Versionamento de código
- **Trello** - Gerenciamento de tarefas (Scrum)

## Como Executar o Projeto

- Clone o repositório:
git clone [(https://github.com/lucasSanto5s/BibliotecaVirtual)](https://github.com/lucasSanto5s/BibliotecaVirtual) 
- Instale as dependências:
composer install
- Configure o arquivo .env com as credenciais do banco de dados.
- Execute as migrations:
php artisan migrate
- Inicie o servidor:
php artisan serve
- Acesse a aplicação em [http://localhost:8000.](http://localhost:8000.)

## Referências


- Documentação Laravel
- Documentação Bootstrap
- GitHub Docs
- MySQL Documentation


