<?php
    // Definir uma constante para o arquivo JSON
    define('ARQUIVO','produtos.json');

    // Carregando o conteúdo do JSON para uma variável
    function getProdutos(){
        $json = file_get_contents(ARQUIVO);
        $produtos = json_decode($json,true);
        return $produtos;
    }
    
    // Função que adiciona um produto ao json
    function addProduto($nome,$descricao,$preco,$foto){

        // carregando produtos
        $produtos = getProdutos(); 
        // Adicionando um novo produto ao array de Produtos
        $produtos[] = [
            'nome' => $nome,
            'descricao' => $descricao,
            'preco' => $preco,
            'foto' => $foto
        ];
        // transformando o array produtos em um json
        $json = json_encode($produtos);        
        // salvar a string json no arquivo
        file_put_contents(ARQUIVO,$json);
    }
    
    // Função para validar dados do post
    function errosNoPost(){
        $erros =[];
        if(!isset($_POST['nome']) || $_POST['nome']==''){
            $erros[] = 'errNome';
        }
        if(!isset($_POST['preco']) || $_POST['preco']==''){
            $erros[] = 'errPreco';
        }
        return $erros;
    }