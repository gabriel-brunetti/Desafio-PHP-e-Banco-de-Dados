<?php
    // como usar o __DIR__ ?, caberia aqui ?
    include('./inc/functions.php');

    // Condicionar o acesso a página a estar logado
    // session_start();
    // if(!$_SESSION['logado']){
    //     // redirecionar para login
    //     header('location: login.php');
    // }

    if($_POST){
        // Verificando o post
        $erros = errosCadastro();
        
        if(count($erros) == 0){
            // Adicionando funcionário no arquivo JSOn
            addFuncionario($_POST['nome'],$_POST['email'],$_POST['senha']);
        }

    } else {

        //  Garantindo que um vetor erros exista quando não houver POST
        $erros = [];
    }

    // errNome será true se o campo nome for inválido
    $errNome = in_array('errNome',$erros);
    //  errEmail será true se o campo email for inválido
    $errEmail = in_array('errEmail',$erros);
    // errSenha será true se o campo senha for inválido
    $errSenha = in_array('errSenha',$erros);
    // errConf será true se a senha e confirmação não baterem
    $errConf = in_array('errConf',$erros);

    // carregando os funcionarios
    $funcionarios = getFuncionarios();
?>
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
        <div class="row">
            <ul class="col-4 list-group p-2">
                <?php foreach ($funcionarios as $f): ?>
                <li class="list-group-item">
                    <span><strong><?= $f['nome']; ?> </strong></span><br>
                    <span><?= $f['email']; ?></span>
                </li>
                <?php endforeach; ?>
            </ul>
            <!-- FORMULARIO CADASTRO FUNCIONARIOS -->
            <form action="" method="post" class="border border-dark p-5 col-8">
                <!-- CAMPO NOME -->
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control <?= (isset($errNome) && $errNome?'is-invalid':'') ?> " id="nome" name="nome" aria-describedby="emailHelp" placeholder="Digite seu nome">
                    <?php if(isset($errNome) && $errNome): ?> <div class="invalid-feedback">Preencha o nome corretamente</div><?php endif; ?>
                </div>
                <!-- CAMPO EMAIL -->
                <div class="form-group">
                    <label for="email">Endereço de email</label>
                    <input type="email" class="form-control <?= (isset($errEmail) && $errEmail ? 'is-invalid':'') ?> " id="email" name="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
                    <small id="emailHelp" class="form-text text-muted">Nos nunca vamos compartilhar seu endereço de e-mail com ninguém.</small>
                    <?php if(isset($errEmail) && $errEmail): ?> <div class="invalid-feedback">Preencha o email corretamente.</div><?php endif; ?>
                </div>
                <!-- CAMPOO SENHA -->
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control <?= (isset($errSenha) && $errSenha ? 'is-invalid':'') ?> " id="senha" name="senha" placeholder="Defina sua Senha">
                    <small id="emailHelp" class="form-text text-muted">Escolha uma senha segura.</small>
                    <?php if(isset($errSenha) && $errSenha): ?> <div class="invalid-feedback">Preencha a senha corretamente</div><?php endif; ?>
                </div>
                <!-- CAMPO CONIFRMAÇÃO DE SENHA -->
                <div class="form-group">
                    <label for="confSenha">Confirmação Senha</label>
                    <input type="password" class="form-control <?= (isset($errConf) && $errConf ?'is-invalid':'') ?> " id="confSenha" name="confSenha" placeholder="Confirme sua senha">
                    <?php if(isset($errConf) && $errConf): ?> <div class="invalid-feedback">A confirmação de senha deve ser igual a senha</div><?php endif; ?>
                </div>
                <!-- PORQUE A MENSAGEM DE ERRO NAO SUMIA ANTES DE COLOCAR isset e && ??? -->
                <!-- BOTÃO -->
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>