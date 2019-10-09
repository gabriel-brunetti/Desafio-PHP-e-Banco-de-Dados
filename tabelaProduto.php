<?php
    include('./inc/functions.php');

    session_start();
    if(!$_SESSION['logado']){
        // redirecionar para login
        header('location: login.php');
    }

    // carregando os produtos
    $produtos = getProdutos();
        
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabela de Produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <!-- HEADER -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand brand-name" href="#">omo<b>box</b> </a></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="./index.php">Home <span class="sr-only">(página atual)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./cadastroUsuarios.php">Cadastro Usuarios</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Produtos
                </a>
                <div class="dropdown-menu active" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./cadastroProduto.php">Cadastro Produtos</a>
                <a class="dropdown-item active" href="./tabelaProduto.php">Tabela Produtos</a>
                </div>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post" action="logout.php">
            <input type="hidden" name="logout">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <!-- FINAL HEADER -->
    <!-- TABELA -->
    <div class="container mt-3 border border-dark">
        <table class="table">   
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $i => $p):?>
                <tr>
                    <th scope="row"><?= $i+1 ?></th>
                    <td><?= $p['nome'] ?></td>
                    <td><?= $p['descricao'] ?></td>
                    <td><?= $p['preco'] ?></td>
                    <td><img src="<?= $p['foto'] ?>" alt="" style="width:64px;border-radius:32px"></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
</body>
</html>