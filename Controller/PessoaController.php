<?php

/**
 * Classe para determinar quais rotas...
 */
class PessoaController 
{
    /**
     * 
     */
    public static function index() 
    {
        include 'Model/PessoaModel.php';

        $model = new PessoaModel();
        $model->getAllRows();

        include 'View/modules/Pessoa/ListaPessoas.php';
    }

    /**
     * 
     */
    public static function form()
    {
        include 'Model/PessoaModel.php'; // inclusão do arquivo model.
        $model = new PessoaModel();

        if(isset($_GET['id'])) // Verificando se existe uma variável $_GET
            $model = $model->getById( (int) $_GET['id']); // Typecast e obtendo o model preenchido vindo da DAO.
            // Para saber mais sobre Typecast, leia: https://tiago.blog.br/type-cast-ou-conversao-de-tipos-do-php-isso-pode-te-ajudar-muito/

        include 'View/modules/Pessoa/FormPessoa.php'; // Include da View. Note que a variável $model está disponível na View.
    }

    /**
     * Preenche um Model para que seja enviado ao banco de dados para salvar.
     */
    public static function save() {
// inclusão do arquivo model.

       // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
       // pelo usuário no formulário (note o envio via POST)
        include 'Model/PessoaModel.php';
        

        $pessoa = new PessoaModel();
        $pessoa->id = $_POST['id'];
        $pessoa->nome = $_POST['nome'];
        $pessoa->rg = $_POST['rg'];
        $pessoa->cpf = $_POST['cpf'];
        $pessoa->data_nascimento = $_POST['data_nascimento'];
        $pessoa->email = $_POST['email'];
        $pessoa->telefone = $_POST['telefone'];
        $pessoa->endereco = $_POST['endereco'];

        $pessoa->save();

        header("Location: /pessoa"); // redirecionando o usuário para outra rota.
    }


    public static function delete()
    {
        include 'Model/PessoaModel.php'; // inclusão do arquivo model.

        $model = new PessoaModel();

        $model->delete( (int) $_GET['id'] ); // Enviando a variável $_GET como inteiro para o método delete

        header("Location: /pessoa"); // redirecionando o usuário para outra rota.
    }

}