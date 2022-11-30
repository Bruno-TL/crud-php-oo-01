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
        $id = $_GET['id'];
        $this->repository->excluir($id);
        $this->reidrect('/cursos/listar');
    }

    public function loopCursoRelatorio(iterable $cursos): string
    {
        $listaCursos='';
        foreach ($cursos as $curso) {
            $listaCursos.= "
                <tr>
                    <td>{$curso['curso_id']}</td>
                    <td>{$curso['curso_nome']}</td>
                    <td>{$curso['curso_carga_horaria']}</td>
                    <td>{$curso['curso_descricao']}</td>
                    <td>{$curso['categoria_nome']}</td>
                </tr>
            ";
        }
        return $listaCursos;
    }

    public function relatorio() :void
    {
        $hoje = date('d/m/Y');
        $cursos = $this->repository->buscarTodos();

        $design = "
            <h1>Relatorio dos Curso da DIGITAL COLLEGE</h1>
            <h2>Curso Cadastrado até a Data:{$hoje}</h2>
            <hr>
            <em>Nunca pense em desistir, desista antes.</em>
            <hr>

            <table border='1' width='100%' style=' background-color: #cccccc; color:black;'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Carga Horaria</th>
                        <th>Curso Descrição</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    ".$this->loopCursoRelatorio($cursos)."
                </tbody>
            </table>
            ";

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait'); //tamanho da pagina
        $dompdf->loadHtml($design); // carrega o conteudo do pdf
        $dompdf->render(); // aqui renderiza
        $dompdf->stream('relatorio-alunos.pdf', [
            'Attachment' => 0,
        ]); //é aqui que a magica acontece
    }
}
