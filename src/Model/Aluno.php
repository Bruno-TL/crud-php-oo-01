<?php

declare(strict_types=1);

use DateTime;

class Aluno
{
    public string $nome;
    public string $cpf;
    public int $matricula;
    public DateTime $dataNascimento;
    public bool $status;
    public string $genero; 
}