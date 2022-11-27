<?php

declare(strict_types=1);

namespace App\Model;

class Curso extends Categoria
{
    public string $nomeCurso;
    public int $cargaHoraria;
    public string $descricao;
    public bool $status;
}