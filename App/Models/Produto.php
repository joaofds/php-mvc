<?php

/**
 *
 * Desenvolvido por: João Ferreira
 * Email: jo4o.fds@gmail.com
 * Github: https://github.com/joaofds
 *
 * Classe responsável apenas para instanciar nossas models.
 *
 */

namespace App\Models;

use App\Database\Connect;
use Exception;

class Produto
{
    /**
     * Busca todos os produtos.
     *
     * @return array $produtos
     */
    public static function all(): array
    {
        // sql
        $sql = "SELECT p.IDPROD, p.NOME, p.COR, pr.PRECO 
                FROM produtos AS p
                JOIN precos AS pr
                ON p.IDPROD = pr.IDPROD
                ORDER BY p.nome";

        // prepara query
        $query = Connect::getInstance()->query($sql);

        // busca dados
        $produtos = $query->fetchAll();

        return $produtos;
    }

    /**
     * Salva novo produto no banco
     *
     * @param object $produto
     * @return bool
     */
    public static function create(object $produto): bool
    {
        try {
            // sql
            $sql = "INSERT INTO produtos (nome, cor) VALUES (?, ?)";

            // instancia PDO e prepara sql
            $insert = Connect::getInstance()->prepare($sql);

            // commit
            $isInserted = $insert->execute(
                [
                    mb_strtoupper($produto->nome),
                    $produto->cor
                ]
            );

            // se os dados foram inseridos na primeira tabela, faz insert na segunda.
            if ($isInserted) {
                // ultimo id inserido
                $idProduto = Connect::getInstance()->lastInsertId();

                $sql = "INSERT INTO precos (IDPROD, PRECO) VALUES (?, ?)";
                $insert = Connect::getInstance()->prepare($sql);
                $resul = $insert->execute(
                    [
                        $idProduto,
                        $produto->preco
                    ]
                );

                return $resul;
            }

            return false;
        } catch (Exception $e) {
            die('Ooops... erro ao inserir dados.');
        }
    }

    /**
     * Atualiza produto.
     *
     * @param int $id
     * @return bool
     */
    public function update($id): bool
    {
        return true;
    }

    /**
     * Deleta um produto
     *
     * @param int $id
     * @return bool
     */
    public function delete($id): bool
    {
        return true;
    }
}
