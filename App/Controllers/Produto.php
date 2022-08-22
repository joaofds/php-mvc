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
        $produtos = ProdutoModel::all();

        // aplica descontos
        foreach ($produtos as $key => $row) {
            if ($row->COR == 'VERMELHO' || $row->COR == 'AZUL') {
                $row->PRECO -= ($row->PRECO * 20 / 100);
            }

            if ($row->COR == 'AMARELO') {
                $row->PRECO -= ($row->PRECO * 10 / 100);
            }


            if ($row->COR == 'VERMELHO' && $row->PRECO > 50.00) {
                $row->PRECO -= ($row->PRECO * 5 / 100);
            }

            // formata para moeda
            $row->PRECO = number_format($row->PRECO, 2, ',', '.');
        }

        $this->view('produto/all', $produtos);
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
            $isInserted = ProdutoModel::create($produto);
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
        $produto = ProdutoModel::find($id);
        $this->view('produto/edit', $produto);
    }

    /**
     * Rotina de atualização de produto
     *
     * @return void
     */
    public function update(): void
    {
        // filtra os campos recebidos.
        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        // verifica se existem campos vazios, se sim mata.
        if (in_array("", $post)) {
            die('Todos os campos são obrigatórios');
        };

        // parse da request para obj por que eu quero.
        $produto = json_decode($post['produto']);

        $result = ProdutoModel::update($produto);
        if ($result) {
            echo json_encode('Produto atualizado com sucesso');
        } else {
            echo json_encode('Erro ao cadastrar produto.');
        }
    }

        /**
     * Rotina de deleção de produto
     *
     * @return void
     */
    public function delete(): void
    {
        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $id = intval($post['id']);
        ProdutoModel::delete($id);
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
