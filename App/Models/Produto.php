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
     * Busca produto pelo id.
     *
     * @param int $id
     * @return object
     */
    public static function find($id): object
    {
        $sql = "SELECT p.IDPROD, p.NOME, pr.PRECO 
        FROM produtos AS p
        JOIN precos AS pr
        ON p.IDPROD = pr.IDPROD
        WHERE p.IDPROD = ? LIMIT 1";

        // prepara query
        $select = Connect::getInstance()->prepare($sql);

        // busca dados
        $select->execute([$id]);
        $produto = $select->fetch();

        return $produto;
    }
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
    public static function update($produto): bool
    {
        // id
        $id = $produto->id;

        // sql
        $sql = "UPDATE produtos SET NOME = ? WHERE IDPROD = ?";

        // prepara sql
        $update = Connect::getInstance()->prepare($sql);

        // atualiza
        $isInserted = $update->execute([mb_strtoupper($produto->nome), $id]);
        if ($isInserted) {
            // sql
            $sql = "UPDATE precos SET PRECO = ? WHERE IDPROD = ?";

            // prepara sql
            $update = Connect::getInstance()->prepare($sql);

            // atualiza
            $result = $update->execute([$produto->preco, $id]);
            return $result;
        }
        return false;
    }

    /**
     * Deleta um produto
     *
     * @param int $id
     * @return bool
     */
    public static function delete($id): bool
    {
        $sql = "DELETE FROM produtos WHERE IDPROD = ?";

        $delete = Connect::getInstance()->prepare($sql);
        $result = $delete->execute([$id]);

        return $result;
    }
}
