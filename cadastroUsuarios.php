<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Cadastro Usuários</title>
</head>
<body>
    <div class="container pt-5">
    <h3 class=pt-4>CADASTRO DE FUNCIONARIOS</h3>
        <!-- FORMULARIO CADASTRO FUNCIONARIOS -->
        <form action="" method="post" class="border border-dark p-5">
            <!-- CAMPO NOME -->
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="emailHelp" placeholder="Digite seu nome">
            </div>
            <!-- CAMPO EMAIL -->
            <div class="form-group">
                <label for="email">Endereço de email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
                <small id="emailHelp" class="form-text text-muted">Nos nunca vamos compartilhar seu endereço de e-mail com ninguém.</small>
            </div>
            <!-- CAMPOO SENHA -->
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" placeholder="Defina sua Senha">
                <small id="emailHelp" class="form-text text-muted">Escolha uma senha segura.</small>
            </div>
            <!-- CAMPO CONIFRMAÇÃO DE SENHA -->
            <div class="form-group">
                <label for="senhaConfirmacao">Confirmação Senha</label>
                <input type="password" class="form-control" id="senhaConfirmacao" placeholder="Confirme sua senha">
            </div>
            <!-- BOTÃO -->
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
