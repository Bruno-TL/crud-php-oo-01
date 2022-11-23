<?php

declare(strict_types=1);

namespace App\Model;

use DateTime;

class Aluno extends Pessoa
{
    public int $matricula;
    public DateTime $dataNascimento;
    public bool $status;
    public string $genero; 
}