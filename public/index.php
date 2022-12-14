<?php

// solicitando ao composer que gerencie o carregamento automatico dos arquivos.

use App\Connection\DatabaseConnection;

include_once '../vendor/autoload.php';

session_start();

include '../config/database.php';


$rotas = require '../config/routes.php';

$url = $_SERVER['REQUEST_URI']; //$_SERVER['REQUEST_URI'] = Pegando a url acessada.
$rota = explode('?',$url)[0];

if(false === isset($rotas[$rota])) {
    echo "Erro 404";
    exit;
}

$controller = $rotas[$rota]['controller'];
$method = $rotas[$rota]['method'];

(new $controller)->$method();