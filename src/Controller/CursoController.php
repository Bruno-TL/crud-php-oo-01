<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Curso;
use App\Repository\CursoRepository;
use Dompdf\Dompdf;
use Exception;

class CursoController extends AbstractController
{
    public function __construct()
    {
        $this->repository = new CursoRepository;
    }

    public function listar() :void
    {
        $cursos = $this->repository->buscarTodos();

        $this->render('curso/listar', [
            'cursos' => $cursos,
        ]);
    }

    public function cadastrar() :void
    {
        if (true === empty($_POST)) {
            $this->render('curso/cadastrar');
            return;
        }

        $curso = new Curso;
        $curso->nome = $_POST['nome'];
        $curso->cargaHoraria = $_POST['cargaHoraria'];
        $curso->descricao = $_POST['descricao'];
        $curso->status = $_POST['status'];
        $curso->categoria_id = $_POST['categoria_id'];

        try {
            $this->repository->inserir($curso);
        } catch (Exception $exception) {
            if (true === str_contains($exception->getMessage(), 'nome')) {
                die('Nome do curso já existe');
            }
            die("Deu ruim meu bom");
        }

        $this->reidrect('/cursos/listar');
    }

    public function editar() :void
    {
        $this->render('curso/editar');
    }

    public function excluir() :void
    {
        $this->render('curso/excluir');
    }

    // public function relatorio() :void
    // // {
    // //     $dompdf = new Dompdf();
    // //     $dompdf->setPaper('A4', 'portrait'); //tamanho da pagina
    // //     $dompdf->loadHtml($design); // carrega o conteudo do pdf
    // //     $dompdf->render(); // aqui renderiza
    // //     $dompdf->stream('relatorio-alunos.pdf', [
    // //         'Attachment' => 0,
    // //     ]); //é aqui que a magica acontece
    // }
}
