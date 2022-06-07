<?php

class FuncionarioModel
{
    public $id, $nome, $rg, $cpf;

    public function save() 
    {
        include 'DAO/funcionarioDAO.php'; // Incluíndo o arquivo DAO

        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new FuncionarioDAO(); 

        // Verificando se a propriedade id foi preenchida no model
        // Para saber mais sobre a palavra-chave this, leia: https://pt.stackoverflow.com/questions/575/quando-usar-self-vs-this-em-php
        if(empty($this->id))
        {
            // Chamando o método insert que recebe o próprio objeto model
            // já preenchido
            $dao->insert($this);

        }else {
            $dao->update($this); // Como existe um id, passando o model para ser atualizado.
        }  
    }


    /**
     * Método que encapsula a chamada a DAO e que abastecerá a propriedade rows;
     * Esse método é importante pois como a model é "vista" na View a propriedade
     * $rows será acessada e possibilitará listar os registros vindos do banco de dados
     */
    public function getAllRows()
    {
        include 'DAO/funcionarioDAO.php'; // Incluíndo o arquivo DAO
        
        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new FuncionarioDAO();

        // Abastecimento da propriedade $rows com as "linhas" vindas do MySQL
        // via camada DAO.
        $this->rows = $dao->select();
    }

    public function GetById(int $id)
    {
        include 'DAO/funcionarioDAO.php'; // Incluíndo o arquivo DAO
        
        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new FuncionarioDAO();

        $obj = $dao->selectById($id);

        return($obj) ? $obj : new FuncionarioModel;
    }

    public function delete(int $id)
    {
        include 'DAO/funcionarioDAO.php';

        $dao = new FuncionarioDAO();

        $dao->delete($id);
    }

}

