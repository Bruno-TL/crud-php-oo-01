<?php

declare(strict_types=1);

namespace App\Controller;

class AlunoController extends AbstractController
{
    public function listar() :void
    {
        $this->render('aluno/listar');
    }

    public function cadastrar() :void
    {
        $this->render('aluno/cadastrar');
    }

    public function editar() :void
    {
        $this->render('aluno/editar');
    }

    public function excluir() :void
    {
        $this->render('aluno/excluir');
    }

}