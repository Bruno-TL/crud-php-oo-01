<?php

require_once '../src/Controller/AlunoController.php';
require_once '../src/Controller/CursoController.php';
require_once '../src/Controller/ProfessorController.php';
require_once '../src/Controller/SiteController.php';

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
    '/alunos/novo' => criarRota(AlunoController::class, 'novo'),
    '/alunos/editar' => criarRota(AlunoController::class, 'editar'),
    '/alunos/excluir' => criarRota(AlunoController::class, 'excluir'),

    '/cursos/listar' => criarRota(CursoController::class, 'listar'),
    '/cursos/novo' => criarRota(CursoController::class, 'novo'),
    '/cursos/editar' => criarRota(CursoController::class, 'editar'),
    '/cursos/excluir' => criarRota(CursoController::class, 'excluir'),

    '/professores/listar' => criarRota(ProfessorController::class, 'listar'),
    '/professores/novo' => criarRota(ProfessorController::class, 'novo'),
    '/professores/editar' => criarRota(ProfessorController::class, 'editar'),
    '/professores/excluir' => criarRota(ProfessorController::class, 'excluir'),
    
];

return $rotas;