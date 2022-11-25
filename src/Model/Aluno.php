<?php

declare(strict_types=1);

namespace App\Model;

// use DateTime;

class Aluno extends Pessoa
{
    public int $matricula;
    public string $dataNascimento;
    public bool $status;
    public string $genero;

    // public function __construct(string $nome, string $dataNascimento)
    // {
    //     $this->nome = ucwords(strtolower($nome));
    //     $this->dataNascimento = $dataNascimento;
    // }
}