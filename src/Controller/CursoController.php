<?php

declare(strict_types=1);

namespace App\Controller;

class CursoController extends AbstractController
{
    public function listar() :void
    {
        $this->render('curso/listar');
    }

    public function cadastrar() :void
    {
        $this->render('curso/cadastrar');
    }

    public function editar() :void
    {
        $this->render('curso/editar');
    }

    public function excluir() :void
    {
        $this->render('curso/excluir');
    }
}
