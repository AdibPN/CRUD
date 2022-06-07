<?php

class PessoaDAO {

    private $conexao;

    public function __construct()
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";

        $this->conexao = new PDO($dsn, $user, $pass);
    }

    public function insert(PessoaModel $model)
    {
        $sql = "INSERT INTO pessoa 
                (nome, rg, cpf, email, data_nascimento, telefone, endereco)
                VALUES
                (?, ?, ?, ?, ?, ?, ?) ";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->rg);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->email);
        $stmt->bindValue(5, $model->data_nascimento);
        $stmt->bindValue(6, $model->telefone);
        $stmt->bindValue(7, $model->endereco);
        $stmt->execute();

    }

    public function update(PessoaModel $model)
    {
        $sql = "UPDATE pessoa SET nome=?, rg =?, cpf=?, email=?, data_nascimento=?, telefone=?, endereco=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->rg);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->email);
        $stmt->bindValue(5, $model->data_nascimento);
        $stmt->bindValue(6, $model->telefone);
        $stmt->bindValue(7, $model->endereco);
        $stmt->bindValue(8, $model->id);
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM pessoa ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        // Retorna um array com as linhas retornadas da consulta. Observe que
        // o array é um array de objetos. Os objetos são do tipo stdClass e 
        // foram criados automaticamente pelo método fetchAll do PDO.
        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    /**
     * Retorna um registro específico da tabela pessoa do banco de dados.
     * Note que o método exige um parâmetro $id do tipo inteiro.
     */
    public function selectById(int $id)
    {
        include_once 'Model/PessoaModel.php';

        $sql = "SELECT * FROM pessoa WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("PessoaModel"); // Retornando um objeto específico PessoaModel
    }


    /**
     * Remove um registro da tabela pessoa do banco de dados.
     * Note que o método exige um parâmetro $id do tipo inteiro.
     */
    public function delete(int $id)
    {
        $sql = "DELETE FROM pessoa WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}