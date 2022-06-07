<?php

/**
 * Crianco a classe e as funçoes
 */
class FuncionarioController 
{
    /**
     * 
     */

    public static function index() 
    {
        include 'Model/FuncionarioModel.php';

        $model = new FuncionarioModel();
        $model->getAllRows();

        include 'View/modules/funcionario/ListaFuncionario.php';
    }

    public static function form() 
    {
        include 'Model/FuncionarioModel.php';
        $model = new FuncionarioModel();

        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']);
        

        include 'View/modules/funcionario/FormFuncionario.php';
    }

    public static function save() 
    {
        include 'Model/FuncionarioModel.php';

        $funcionario = new FuncionarioModel();
        $funcionario->id = $_POST['id'];
        $funcionario->nome = $_POST['nome'];
        $funcionario->rg = $_POST['rg'];
        $funcionario->cpf = $_POST['cpf'];

        $funcionario->save();

        header("location: /funcionario"); //redirecionando o usuario para outra rota
    }

    public static function delete()
    {
        include 'Model/FuncionarioModel.php';

        $model = new FuncionarioModel();

        $model->delete( (int) $_GET['id'] ); //enviando a variável $_GET como inteiro para o método delete

        header("Location: /funcionario");
    
    }
}