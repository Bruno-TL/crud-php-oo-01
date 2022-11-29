<?php
declare(strict_types=1);

namespace App\Repository;

use App\Connection\DatabaseConnection;
use App\Model\Categoria;
use PDO;

class CategoriaRepository implements RepositoryInterface
{
    public const TABLE = "tb_categorias";

    public function buscarTodos(): iterable
    {
        $conexao = DatabaseConnection::abrirConexao();
        $sql = "SELECT * FROM ".self::TABLE;
        $query = $conexao->query($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS, Categoria::class);
    }

    public function buscarUm(string $id): ?object
    {
        return new \stdClass();
    }

    public function inserir(object $dados): object
    {
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