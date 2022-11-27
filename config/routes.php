<?php

use App\Controller\AlunoController;
use App\Controller\CursoController;
use App\Controller\ProfessorController;
use App\Controller\SiteController;

function criarRota(string $controllerName, string $methodName) :array
{
    return [
        'controller' => $controllerName,
        'method' => $methodName,
    ];
}

$rotas = [
    '/' => criarRota(SiteController::class, 'inicio'),

    '/alunos/listar' => criarRota(AlunoController::class, 'listar'),
    '/alunos/novo' => criarRota(AlunoController::class, 'cadastrar'),
    '/alunos/editar' => criarRota(AlunoController::class, 'editar'),
    '/alunos/excluir' => criarRota(AlunoController::class, 'excluir'),
    '/alunos/relatorio' => criarRota(AlunoController::class, 'relatorio'),

    '/cursos/listar' => criarRota(CursoController::class, 'listar'),
    '/cursos/cadastrar' => criarRota(CursoController::class, 'cadastrar'),
    '/cursos/editar' => criarRota(CursoController::class, 'editar'),
    '/cursos/excluir' => criarRota(CursoController::class, 'excluir'),

    '/professores/listar' => criarRota(ProfessorController::class, 'listar'),
    '/professores/novo' => criarRota(ProfessorController::class, 'novo'),
    '/professores/editar' => criarRota(ProfessorController::class, 'editar'),
    '/professores/excluir' => criarRota(ProfessorController::class, 'excluir'),
    
];

return $rotas;