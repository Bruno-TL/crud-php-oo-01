<?php

declare(strict_types=1);
namespace App\Repository;

use App\Connection\DatabaseConnection;
use App\Model\User;
use PDO;

class UserRepository
{
    private PDO $pdo;
    private const TABLE = 'tb_user';

    public function __construct()
    {
        $this->pdo = new DatabaseConnection();
    }

    public function findAll(): iterable
    {
        $sql = "SELECT * FROM ".self::TABLE;
        return $this->pdo->query($sql);
    }

    public function insert(User $user): User
    {
        $sql = "INSERT INTO ".self::TABLE."(nome,email,senha,perfil)";
        $sql.= " VALUES ('{$user->nome}','{$user->email}','{$user->senha}','{$user->perfil}');";

        $this->pdo->query($sql);

        return $user;
    }
}
