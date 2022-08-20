<?php

/**
 *
 * Desenvolvido por: João Ferreira
 * Email: jo4o.fds@gmail.com
 * Github: https://github.com/joaofds
 *
 * Classe responsável por criar nossas instâncias do banco de dados
 *
 */

namespace App\Database;

use PDO;
use PDOException;

class Connect
{
    private const HOST = '127.0.0.1';
    private const USER = 'root';
    private const PASSWD = 'root';
    private const DBNAME = 'crud_produtos';

    private const OPTIONS =
    [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    private static $instance;

    /**
     * Método que irá abrir a conexão com o banco.
     *
     * @return PDO
     */
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    'mysql:host='.self::HOST.';dbname='.self::DBNAME,
                    self::USER,
                    self::PASSWD,
                    self::OPTIONS
                );
            } catch (PDOException $e) {
                echo $e->getMessage();
                die('Oops... erro ao conectar com o banco de dados...');
            }
        }

        return self::$instance;
    }
}
