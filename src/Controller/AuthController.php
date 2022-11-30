<?php

declare(strict_types=1);
namespace App\Controller;

use App\Repository\UserRepository;
use App\Security\UserSecurity;

class AuthController extends AbstractController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function login(): void
    {
        if(false === empty($_POST)){
            $email=$_POST['email'];
            $senha=$_POST['senha'];

            $user = $this->userRepository->findOneByEmail($email);

            if(false === $user){
                die('Email não existe');
            }

            if(false === password_verify($senha, $user->senha)){
                die('Senha incorreta');
            }

            UserSecurity::connect($user);

            $this->render('inicio/inicio');
            return;
        }
        $this->render('auth/login', navbar: false);
    }

    public function logout(): void
    {
        UserSecurity::disconnect();
        $this->reidrect('/login');
    }
}