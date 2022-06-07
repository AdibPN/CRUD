<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/produto/save" method="post">
        <fieldset>
            <legend>Cadastro de Pessoa</legend>

            <input type="hidden" value="<?= $model->id ?>" name="id" />

            <label for="nome">Nome:</label>
            <input name="nome" id="nome" type="text" value="<?= $model->nome ?>"/>

            <label for="preco">preco:</label>
            <input name="preco" id="preco" type="number" value="<?= $model->preco ?>"/>

            <label for="desc">Descricao:</label>
            <input name="desc" id="desc" type="text" value="<?= $model->descricao ?>"/>


            <button type="submit">Enviar</button>

        </fieldset>
    </form>    
</body>
</html>