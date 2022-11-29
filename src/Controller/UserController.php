<?php

declare(strict_types=1);
namespace App\Controller;

use App\Model\User;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    private UserRepository $repository;

    public function __construct()
    {
        $this->repository =new UserRepository();
    }

    public function listar(): void
    {
        $users = $this->repository->findAll();

        $this->render('usuarios/listar', [
            'users' => $users,
        ]);
    }

    public function adicionar(): void
    {
        if(true === empty($_POST)) {
            $this->render('usuarios/adicionar');
            return;
        }

        $senha = password_hash($_POST['senha'], PASSWORD_ARGON2I);

        $user = new User();
        $user->nome = $_POST['nome'];
        $user->email= $_POST['email'];
        $user->senha = $senha;
        $user->perfil = $_POST['perfil'];

        $this->repository->insert($user);
        $this->reidrect('/usuarios/listar');
    }
}