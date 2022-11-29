<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Aluno;
use App\Repository\AlunoRepository;
use App\Security\UserSecurity;
use Dompdf\Dompdf;
use Exception;

class AlunoController extends AbstractController
{
    private AlunoRepository $repository;

    public function __construct()
    {
        $this->repository = new AlunoRepository;
    }

    public function listar(): void
    {
        // if(UserSecurity::isLogged() === false){
        //     die('Erro, precisa estar logado');
        // }
        $this->checkLogin();
        $alunos = $this->repository->buscarTodos();
        $this->render('aluno/listar', ['alunos' => $alunos,]);
    }

    public function cadastrar(): void
    {
        if (true === empty($_POST)) {
            $this->render('aluno/cadastrar');
            return;
        }

        $aluno = new Aluno();
        $aluno->nome = $_POST['nome'];
        $aluno->dataNascimento = $_POST['nascimento'];
        $aluno->cpf = $_POST['cpf'];
        $aluno->email = $_POST['email'];
        $aluno->genero = $_POST['genero'];

        try {
            $this->repository->inserir($aluno);
        } catch (Exception $exception) {
            if (true === str_contains($exception->getMessage(), 'cpf')) {
                die('CPF já existe');
            }

            if (true === str_contains($exception->getMessage(), 'email')) {
                die('Email já existe');
            }

            die('Vish, aconteceu um erro');
        }

        $this->reidrect('/alunos/listar');
    }

    public function editar(): void
    {
        $this->checkLogin();
        $id = $_GET['id'];
        $aluno = $this->repository->buscarUm($id);

        $this->render('aluno/editar', [$aluno]);
        if (false === empty($_POST)) {
            $aluno->nome = $_POST['nome'];
            $aluno->dataNascimento = $_POST['nascimento'];
            $aluno->cpf = $_POST['cpf'];
            $aluno->email = $_POST['email'];
            $aluno->genero = $_POST['genero'];

            try {
                $this->repository->atualizar($aluno, $id);
            } catch (Exception $exception) {
                if (true === str_contains($exception->getMessage(), 'cpf')) {
                    die('CPF ja existe');
                }

                if (true === str_contains($exception->getMessage(), 'email')) {
                    die('Email ja existe');
                }

                die('Vish, aconteceu um erro');
            }
            $this->reidrect('/alunos/listar');
        }
    }

    public function excluir(): void
    {
        $id = $_GET['id'];
        $this->repository->excluir($id);
        $this->reidrect('/alunos/listar');
    }

    public function relatorio(): void
    {
        $hoje = date('d/m/Y');
        $alunos = $this->repository->buscarTodos();

        $design = "
            <h1>Relatorio em {$hoje}</h1>
            <hr>
            <em>Gerado em {$hoje}</em>

            <table border='1' width='100%' style='margin: top 30px;'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Matricula</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Genero</th>
                        <th>Data Nascimento</th>
                        <th>Cpf</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{$alunos[0]->id}</td>
                        <td>{$alunos[0]->nome}</td>
                    </tr>
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
