<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Curso;
use App\Repository\CursoRepository;
use App\Repository\CategoriaRepository;
use Dompdf\Dompdf;
use Exception;

class CursoController extends AbstractController
{
    private CursoRepository $repository;

    public function __construct()
    {
        $this->repository = new CursoRepository;
    }

    public function listar() :void
    {
        $this->checkLogin();
        $cursos = $this->repository->buscarTodos();

        $this->render('curso/listar', [
            'cursos' => $cursos,
        ]);
    }

    public function cadastrar() :void
    {
        $rep = new CategoriaRepository();
        if (true === empty($_POST)) {
            $categorias = $rep->buscarTodos();
            $this->render('curso/cadastrar',[
                'categorias' => $categorias
            ]);
            return;
        }

        $curso = new Curso;
        $curso->nome = $_POST['nome'];
        $curso->cargaHoraria = $_POST['cargaHoraria'];
        $curso->descricao = $_POST['descricao'];
        $curso->categoria_id = intval($_POST['categoria']);

        try {
            // possivel ERRO
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
        $id = $_GET['id'];
        $rep = new CategoriaRepository();
        $categorias = $rep->buscarTodos();
        $curso = $this->repository->buscarUm($id);
        $this->render('curso/editar',[
            'categorias' => $categorias,
            'curso' => $curso
        ]);

        if(false === empty($_POST)){
            $curso = new Curso();
            $curso->nome = $_POST['nome'];
            $curso->descricao = $_POST['descricao'];
            $curso->cargaHoraria = $_POST['cargaHoraria'];
            $curso->categoria_id = intval($_POST['categoria']);
            $this->repository->atualizar($curso,$id);
            $this->reidrect('/cursos/listar');
        }
    }

    public function excluir() :void
    {

        $this->render('curso/excluir');
    }

    // public function relatorio() :void
    // {
    //     $dompdf = new Dompdf();
    //     $dompdf->setPaper('A4', 'portrait'); //tamanho da pagina
    //     $dompdf->loadHtml($design); // carrega o conteudo do pdf
    //     $dompdf->render(); // aqui renderiza
    //     $dompdf->stream('relatorio-alunos.pdf', [
    //         'Attachment' => 0,
    //     ]); //é aqui que a magica acontece
    // }
}
