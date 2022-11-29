<?php

declare(strict_types=1);
namespace App\Security;

use App\Model\User;

abstract class UserSecurity
{
    public static function disconnect(): void
    {
        session_destroy();
    }

    public static function isLogged(): bool
    {
        return isset($_SESSION['user_escola']);
    }

    public static function connect(User $user): void
    {
        $user->senha = '';
        $_SESSION['user_escola'] = $user;
    }

    public static function getUser(): User
    {
        return $_SESSION['user_escola'];
    }
}