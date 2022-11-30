<?php

include dirname(__DIR__)."/vendor/autoload.php";
include 'database.php';

use App\Repository\UserRepository;
use App\Model\User;

$admin = new User();
$admin->nome = 'Admin';
$admin->email = 'admin@admin.com';
$admin->perfil = 'admin';
$admin->senha = password_hash('1234',PASSWORD_ARGON2I);

(new UserRepository())->insert($admin);