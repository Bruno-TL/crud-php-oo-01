<?php
declare(strict_types=1);

namespace App\Repository;

use App\Connection\DatabaseConnection;
use App\Model\Categoria;
use PDO;

class CategoriaRepository implements RepositoryInterface
{
    public const TABLE = "tb_categorias";

    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::abrirConexao();
    }

    public function buscarTodos(): iterable
    {
        $sql = "SELECT * FROM ".self::TABLE;
        $query = $this->pdo->query($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS, Categoria::class);
    }

    public function buscarUm(string $id): ?object
    {
        return new \stdClass();
    }

    public function inserir(object $dados): object
    {
        $sql = "INSERT INTO ".self::TABLE."(nome)
        VALUES ('{$dados->nome}');";
        $this->pdo->query($sql);

        return $dados;
    } 


    public function atualizar(object $dados, string $id): object
    {
        return $dados;
    }

    public function excluir(string $id): void
    {
        $conexao = DatabaseConnection::abrirConexao();
        $sql = "DELETE FROM ".self::TABLE." WHERE id = '{$id}'";
        $query = $conexao->query($sql);
        $query->execute();
    }
}