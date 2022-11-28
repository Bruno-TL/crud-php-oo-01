<?php

declare(strict_types=1);

namespace App\Model;

class Curso extends Categoria
{
    public string $nome;
    public int $cargaHoraria;
    public string $descricao;
    public bool $status;
}