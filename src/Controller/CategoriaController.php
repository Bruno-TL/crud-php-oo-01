<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Categoria;
use App\Repository\CategoriaRepository;

class CategoriaController extends AbstractController
{
    private CategoriaRepository $repository;

    public function __construct()
    {
        $this->repository = new CategoriaRepository();
    }

    public function listar(): void
    {
        $this->checkLogin();
        $categorias = $this->repository->buscarTodos();
        $this->render('categoria/listar',[
            'categorias' => $categorias
        ]);
    }

    public function cadastrar(): void
    {
        if (true === empty($_POST)) {
            $this->render('categoria/cadastrar');
            return;
        }

        $categoria = new Categoria();
        $categoria->nome = $_POST['nome'];

        $this->repository->inserir($categoria);
        $this->reidrect('/categorias/listar');
    }

    public function editar(): void
    {

    }

    public function excluir(): void
    {

    }
}