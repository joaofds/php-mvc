<?php

/**
 *
 * Desenvolvido por: João Ferreira
 * Email: jo4o.fds@gmail.com
 * Github: https://github.com/joaofds
 *
 */

// Carrega autoload psr4.
require __DIR__ . '/../../vendor/autoload.php';

// Cria sessão se ainda não foi criada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Configurações para mostrar erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define timezone
date_default_timezone_set('America/Sao_Paulo');

// Init de app
use App\Core\Container;
use App\Core\Controller;

(new Container());
