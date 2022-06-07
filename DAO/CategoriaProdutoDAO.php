<?php

class CategoriaProdutoDAO
{
    private $conexao;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";

        $this->conexao = new PDO($dsn, 'root', 'etecjau');
    }

    public function insert(CategoriaProdutoModel $model)
    {
        $sql = "INSERT INTO CategoriaProduto (nome, descricao) VALUES (?, ?) ";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);

        $stmt->execute();
    }

    public function update(CategoriaProdutoModel $model)
    {
        $sql = "UPDATE CategoriaProduto SET nome=?, descricao=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->id);
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT id, nome, descricao FROM CategoriaProduto ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }

    public function selectById(int $id)
    {
        include_once 'Model/CategoriaProdutoModel.php';

        $sql = "SELECT id, nome, descricao FROM CategoriaProduto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("CategoriaProdutoModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM CategoriaProduto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}