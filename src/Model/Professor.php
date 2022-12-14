<?php

declare(strict_types=1);

namespace App\Model;

class Professor
{
    public string $nome;
    public string $cpf;
    public string $endereco;
    public ?string $formacao = null;
    public bool $status;
    public array $horariosDisponiveis = [];

}