<?php

class ProdutoModel
{
    public $id, $nome, $preco, $descricao;
    
    public function save() 
    {
        include 'DAO/ProdutoDAO.php'; // Incluíndo o arquivo DAO

        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new ProdutoDAO(); 

        // Verificando se a propriedade id foi preenchida no model
        // Para saber mais sobre a palavra-chave this, leia: https://pt.stackoverflow.com/questions/575/quando-usar-self-vs-this-em-php
        if(empty($this->id))
        {
            // Chamando o método insert que recebe o próprio objeto model
            // já preenchido
            $dao->insert($this);

        } else {
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
        include 'DAO/ProdutoDAO.php'; // Incluíndo o arquivo DAO
        
        // Instância do objeto e conexão no banco de dados via construtor
        $dao = new ProdutoDAO();

        // Abastecimento da propriedade $rows com as "linhas" vindas do MySQL
        // via camada DAO.
        $this->rows = $dao->select();
    }

    /**
     * Método que encapsula o acesso ao método selectById da camada DAO
     * O método recebe um parâmetro do tipo inteiro que é o id do registro
     * a ser recuperado do MySQL, via camada DAO.
     */
    public function getById(int $id)
    {
        include 'DAO/ProdutoDAO.php'; // Incluíndo o arquivo DAO

        $dao = new ProdutoDAO();

        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

        // Para saber mais operador ternário, leia: https://pt.stackoverflow.com/questions/56812/uso-de-e-em-php
        return ($obj) ? $obj : new ProdutoModel(); // Operador Ternário

  
    }

     /**
     * Método que encapsula o acesso a DAO do método delete.
     * O método recebe um parâmetro do tipo inteiro que é o id do registro
     * que será excluido da tabela no MySQL, via camada DAO.
     */
    public function delete(int $id)
    {
        include 'DAO/ProdutoDAO.php'; // Incluíndo o arquivo DAO

        $dao = new ProdutoDAO();

        $dao->delete($id);
    }


}

