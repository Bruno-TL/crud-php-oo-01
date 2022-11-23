<?php
declare(strict_types=1);

namespace App\Model;

abstract class Pessoa 
{
    public string $nome;
    public string $cpf;
}

$p = new Pessoa();
$p->nome = "Bruno";
echo "OI,".$p->nome;