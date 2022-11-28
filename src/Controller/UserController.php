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
        $user = $this->repository->findAll();

        $this->render('user/listar', [
            'user' => $user,
        ]);
    }

    public function adicionar(): void
    {
        if(true === empty($_POST)) {
            $this->render('user/adicionar');
            return;
        }

        $senha = password_hash($_POST['senha'], PASSWORD_ARGON2I);

        $user = new User();
        $user->name = $_POST['nome'];
        $user->email= $_POST['email'];
        $user->senha = $senha;
        $user->perfil = $$_POST['perfil'];
    }
}