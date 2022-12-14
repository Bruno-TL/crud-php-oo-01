<?php

use App\Controller\AlunoController;
use App\Controller\AuthController;
use App\Controller\CategoriaController;
use App\Controller\CursoController;
use App\Controller\ProfessorController;
use App\Controller\SiteController;
use App\Controller\UserController;

function criarRota(string $controllerName, string $methodName) :array
{
    return [
        'controller' => $controllerName,
        'method' => $methodName,
    ];
}

$rotas = [
    '/' => criarRota(SiteController::class, 'inicio'),
    '/home' => criarRota(SiteController::class, 'home'),

    '/alunos/listar' => criarRota(AlunoController::class, 'listar'),
    '/alunos/novo' => criarRota(AlunoController::class, 'cadastrar'),
    '/alunos/editar' => criarRota(AlunoController::class, 'editar'),
    '/alunos/excluir' => criarRota(AlunoController::class, 'excluir'),
    '/alunos/relatorio' => criarRota(AlunoController::class, 'relatorio'),

    '/cursos/listar' => criarRota(CursoController::class, 'listar'),
    '/cursos/cadastrar' => criarRota(CursoController::class, 'cadastrar'),
    '/cursos/editar' => criarRota(CursoController::class, 'editar'),
    '/cursos/excluir' => criarRota(CursoController::class, 'excluir'),
    '/cursos/relatorio' => criarRota(CursoController::class, 'relatorio'),

    '/professores/listar' => criarRota(ProfessorController::class, 'listar'),
    '/professores/novo' => criarRota(ProfessorController::class, 'novo'),
    '/professores/editar' => criarRota(ProfessorController::class, 'editar'),
    '/professores/excluir' => criarRota(ProfessorController::class, 'excluir'),

    '/categorias/listar' => criarRota(CategoriaController::class, 'listar'),
    '/categorias/cadastrar'=> criarRota(CategoriaController::class, 'cadastrar'),
    '/categorias/editar'=> criarRota(CategoriaController::class, 'editar'),
    '/categorias/excluir'=> criarRota(CategoriaController::class, 'excluir'),

    '/usuarios/listar' => criarRota(UserController::class, 'listar'),
    '/usuarios/adicionar' =>criarRota(UserController::class, 'adicionar'),
    '/usuarios/excluir' => criarRota(UserController::class, 'excluir'),

    '/login' =>criarRota(AuthController::class, 'login'),
    '/logout'=>criarRota(AuthController::class,'logout')
    
];

return $rotas;