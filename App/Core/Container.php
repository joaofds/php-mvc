<?php

/**
 *
 * Desenvolvido por: João Ferreira
 * Email: jo4o.fds@gmail.com
 * Github: https://github.com/joaofds
 *
 * O Container é responsável por buscar os seguimentos da rota digitada e instanciar o
 * controller executar o método e passar os parametros caso existam. Ex: /usuario/buscar/1.
 */

namespace App\Core;

class Container
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    protected $error = false;

    // construtor
    public function __construct()
    {
        // URL
        $urlArray = $this->urlParse();

        // Executa métodos sempre que é instanciado
        $this->getController($urlArray);
        $this->getMethod($urlArray);
        $this->getParams($urlArray);

        // Chama o método da classe atual dinamicamente.
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Busca url[0] para encontar o controller e instânciar.
     *
     * @param array $url
     * @return void
     */
    private function getController($url): void
    {
        if (!empty($url[0]) && isset($url[0])) {
            if (file_exists('../App/Controllers/' . ucfirst($url[0])  . '.php')) {
                $this->controller = ucfirst($url[0]);
            } else {
                $this->error = true;
                $this->method = 'pageNotFound';
            }
        }

        require '../App/Controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();
    }

    /**
     * Busca url[1] para encontar o metodo e atribui a $this->method.
     *
     * @param array $url
     * @return void
     */
    private function getMethod($url)
    {
        if (!empty($url[1]) && isset($url[1])) {
            if (method_exists($this->controller, $url[1]) && !$this->error) {
                $this->method = $url[1];
            } else {
                // Se a classe ou metodo não exista chamo metodo de erro do controller
                $this->method = 'pageNotFound';
            }
        }
    }

    /**
     * Busca parametros em url[2], se existir atribui a $this->params.
     *
     * @param array $url
     * @return void
     */
    private function getParams($url)
    {
        if (count($url) > 2) {
            $this->params = array_slice($url, 2);
        }
    }

    /**
     * Captura url e faz o parse pegando cada parte em um array.
     *
     * @return array
     */
    private function urlParse()
    {
        return explode('/', substr(filter_input(INPUT_SERVER, 'REQUEST_URI'), 1));
    }
}
