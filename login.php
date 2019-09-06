<?php
    // importar funções php
    include('./inc/functions.php');

    // Condicionando o login ao botão login
    if($_POST){
        // executando a função logar
        $loginOK =logar($_POST['email'],$_POST['senha']);
        // função logar retorna true ou false
        if($loginOK){

            // Criando a session
            session_start();
            $_SESSION['logado'] = true;

            // Redirecionando para index
            header('location: cadastroUsuarios.php');
        } if($loginOK == false){
            ?>
            <div class="alert alert-danger" role="alert">
            Erro Login
            </div>
            <?php
        }
    } else {
        // garantindo que a mensagem de erro não sera exebida sem a tentativa de login
        $loginOK = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container pt-5 d-flex flex-column align-items-center">
        <form action="" method="post" class="border border-dark px-5 py-5 col-8">
        <h3 class="py-1 align-self-start">LOGIN</h3>
            <!-- CAMPO EMAIL -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha">
                <small id="senhaHelp" class="form-text text-muted"><a href="">Esqueci minha senha</a>.</small>
            </div>
            <button class="btn btn-primary">Login</button>
        </form>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>