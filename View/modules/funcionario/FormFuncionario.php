<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionario</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/funcionario/save" method="post">
        <fieldset>
            <legend>Cadastro de Funcionario</legend>
            <input type="hidden" value="<?= $model->id ?>" name="id" />

            <label for="nome">Nome:</label>
            <input name="nome" id="nome" type="text" value="<?= $model->nome ?>" />

            <label for="rg"> RG: </label>
            <input name="rg" id="rg" type="number" value="<?= $model->rg ?>" />

            <label for="cpf">CPF:</label>
            <input name="cpf" id="cpf" type="number"  value="<?= $model->cpf ?>"/>

            <button type="submit">Enviar</button>

        </fieldset>
    </form>    
</body>
</html>