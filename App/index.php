<?php

    include 'Controller/UsuarioController.php';
    
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    switch($url){
        case '/':
            echo "Página inicial";
            break;
        case '/usuario':
            UsuarioController::index();
            break;
        case '/usuario/form':
            UsuarioController::form();
            break;
        case '/usuario/form/salvar':
            UsuarioController::salvar();
            break;
        case '/usuario/delete':
            UsuarioController::deletar();
        default:
            echo "Erro 404";
            break;
    }
    
?>