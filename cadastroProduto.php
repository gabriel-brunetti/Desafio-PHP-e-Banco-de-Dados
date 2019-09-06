<?php
    include('./inc/functions.php');

    // Condicionar o acesso a página a estar logado
    session_start();
    if(!$_SESSION['logado']){
        // redirecionar para login
        header('location: login.php');
    }

    if($_POST){
        
        // verificando o post
        $erros = errosNoPost();

            // Função para validar a foto
            // versão do Sérgio
            if(($_FILES) && ($_FILES['foto']) && ($_FILES['foto']['error']==0)){
            
            // Salvar as fotos com outro nome
            $fotoCaminho = './fotos/.'. $_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'],$fotoCaminho);
            }

            if(count($erros) == 0){
                // Adicionando produto ao JSON
                addProduto($_POST['nome'],$_POST['descricao'],$_POST['preco'],$fotoCaminho);
            }
            
    } else {

        //Garantindo que um vetor erros exista
        // ainda que vazio quando não houver POST
        $erros =[];
    }

    // errNome será true se o campo nome for inválido e false se o campo estiver ok. 
    $errNome = in_array('errNome',$erros);
    // errPreco será true se o campo preço for inválido ou vazio e false se o campo estiver ok.
    $errPreco = in_array('errPreco',$erros);
    // carregando os produtos
    $produtos = getProdutos();
        
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<!-- HEADER -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home <span class="sr-only">(página atual)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./cadastroUsuarios.php">Cadastro Usuarios</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Produtos
                </a>
                <div class="dropdown-menu active" aria-labelledby="navbarDropdown">
                <a class="dropdown-item active" href="./cadastroProduto.php">Cadastro Produtos</a>
                <a class="dropdown-item" href="./tabelaProduto.php">Tabela Produtos</a>
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
<!-- CONTEUDO PAGINA -->
<div class="container">
    <h3 class=pt-4>CADASTRO DE PRODUTOS</h3>
    <div class="row pt-3">
        <ul class="col-4 list-group p-2">
        <?php foreach($produtos as $p): ?>
        <li class="list-group-item">
            <img src="<?= $p['foto'];?>" alt="<?= $p['nome'];?>" style="width:128px;border-radius:64px"><br>
            <span><strong><?= $p['nome']; ?></strong></span><br>
            <span><?= $p['descricao']; ?></span>
        </li>
        <?php endforeach; ?>
        </ul>
    
    <form action="" method="post" class="bg-light col-8 p-2" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input value="" type="text" class="form-control <?= (isset($errNome) && $errNome?'is-invalid':'')?>" name="nome" id="nome" placeholder="Digite o nome do produto">
            <?php if(isset($errNome) && $errNome): ?><div class="invalid-feedback">Preencha o nome corretamente.</div><?php endif; ?>
        </div>
        
        <div class="form-group">
            <label for="descricao">Descrição do Produto</label>
            <textarea name="descricao" class="form-control" id="descricao" rows="5"></textarea>
        </div>

        <div class="form-group col-4 pl-0">
            <label for="preco">Preço</label>
            <input type="number" class="form-control <?= (isset($errPreco) && $errPreco?'is-invalid':'')?>" name="preco" id="preco" step="0.01" min="0" placeholder="Digite o valor do produto">
            <?php if(isset($errPreco) && $errPreco): ?><div class="invalid-feedback">Preencha o preço do produto.</div><?php endif;?>
        </div>

        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="foto" id="foto">
                <label class="custom-file-label" for="foto">Escolha uma foto bonita</label>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Enviar</button>
    </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
</body>
</html>