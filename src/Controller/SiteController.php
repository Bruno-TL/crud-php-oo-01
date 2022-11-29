<?php

declare(strict_types=1);

namespace App\Controller;

class SiteController extends AbstractController
{
    public function inicio() :void
    {
        // $this->render('inicio/inicio');
        $this->checkLogin();
    }
}