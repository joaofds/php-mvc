<?php

/**
 *
 * Desenvolvido por: João Ferreira
 * Email: jo4o.fds@gmail.com
 * Github: https://github.com/joaofds
 *
 */

use App\Core\Controller;

class Home extends Controller
{
    public function index()
    {
        $this->view('home/index');
    }
}
