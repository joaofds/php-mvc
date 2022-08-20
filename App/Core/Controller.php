<?php

/**
 *
 * Desenvolvido por: João Ferreira
 * Email: jo4o.fds@gmail.com
 * Github: https://github.com/joaofds
 *
 * Classe responsável apenas para instanciar nossas views.
 *
 */

namespace App\Core;

abstract class Controller
{
    /**
     * Resolve nossas views
     *
     * @param string $view
     * @param array $data
     * @return void
     */
    public function view($view, $data = [])
    {
        require '../App/Views/' . $view . '.php';
    }

    /**
     * Se não existe o método passado no segundo seguimento da rota
     * no controller a página 404 é chamada.
     *
     * @return void
     */
    public function pageNotFound()
    {
        $this->view('errors/404');
    }
}
