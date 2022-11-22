<?php

declare(strict_types=1);

class Professor
{
    public string $nome;
    public string $cpf;
    public string $endereço;
    public ?string $formacao = null;
    public bool $status;
    public array $horariosDisponiveis = [];

}