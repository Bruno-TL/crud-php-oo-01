<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\CursoRepository;

class CursoController extends AbstractController
{
    public function listar() :void
    {
        $rep = new CursoRepository();
        $cursos = $rep->buscarTodos();

        $this->render('curso/listar', [
            'cursos' => $cursos,
        ]);
    }

    public function cadastrar() :void
    {
        // $rep = new CategoriaRepository();
        // $categoria = $rep->buscarTodos();
        // $this->render('curso/cadastrar');
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
