<?php

/**
 *
 * Desenvolvido por: João Ferreira
 * Email: jo4o.fds@gmail.com
 * Github: https://github.com/joaofds
 *
 */

use App\Core\Controller;
use App\Models\Produto as ProdutoModel;

class Produto extends Controller
{
    /**
     * Listagem de produtos.
     *
     * @return void
     */
    public function index(): void
    {
        $this->view('produto/all');
    }

    /**
     * Mostra view de cadastro de produto.
     *
     * @return void
     */
    public function create(): void
    {
        $cores = $this->cores();
        $this->view('produto/create', $cores);
    }

    /**
     * Rotina de cadastro de novo produto.
     *
     * @return void
     */
    public function store(): void
    {
        // filtra os campos recebidos.
        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        // verifica se existem campos vazios, se sim mata.
        if (in_array("", $post)) {
            die('Todos os campos são obrigatórios');
        };

        // parse da request para obj por que eu quero.
        $produto = json_decode($post['produto']);
        if (!empty($produto->nome)) {
            // passo o produto para metodo estatico que faz o insert
            $isInserted = ProdutoModel::createProduct($produto);
            if ($isInserted) {
                echo json_encode('Sucesso, produto cadastrado com sucesso.');
            } else {
                echo json_encode('Erro ao cadastrar o produto.');
            }
        }
    }

    /**
     * Mostra view de edição de produto.
     *
     * @return void
     */
    public function edit($id): void
    {
        # code...
    }

    /**
     * Rotina de atualização de produto
     *
     * @return void
     */
    public function update(): void
    {
        # code...
    }

    /**
     * Retorna cores para formulario de cadastro de produto.
     *
     * @return array
     */
    public function cores(): array
    {
        return [
            1 => 'AMARELO',
            2 => 'AZUL',
            3 => 'VERMELHO'
        ];
    }
}
