<?php

declare(strict_types=1);

class AlunoController
{
    public function listar() :void
    {
        $this->renderizar('listar');
    }

    public function cadastrar() :void
    {
        $this->renderizar('cadastrar');
    }

    public function editar() :void
    {
        $this->renderizar('editar');
    }

    public function excluir() :void
    {
        $this->renderizar('excluir');
    }

    public function renderizar(string $arquivo, ?array $dados = null)
    {
        include "../Views/aluno/{$arquivo}.phtml";
        $dados;
    }
}