<?php
    //  ----------- PRODUTOS -------------------

    // Definir uma constante para o arquivo produtons.JSON
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

    // ----------- FUNCIONARIOS --------------

    // Definir uma constante para o arquivo funcionarios.json
    define('ARQUIVOFUNC','funcionarios.json')

    // Carregando o contéudo do JSON para uma variável
    function getFuncionarios(){
        // carregando o arquivo json (constante nao usam aspas)
        $json = file_get_contents(ARQUIVOFUNC);
        // decodificando o conteudo json para array assosiativo
        $funcionarios = json_decode($json,true);
        // retornando a variavel para ser consutavel
        return $funcionarios;
    }

    // Função que adiciona um funcionário ao json
    function addFuncionario($nome,$email,$senha){

        // Carregando os funcionarios
        $funcionarios = getFuncionarios();

        // Encriptando a senha
        $hash = password_hash (string $senha, PASSWORD_DEFAULT);

        // Adicionando um funcionário ao JSON
        $funcionarios[] = [
            'nome' => $nome,
            'email' => $email,
            'senha' => $hash
        ];
        
        // Codificando o arquivo em json
        $json = json_encode($funcionarios);

        // Salvar a string no json
        file_put_contents(string ARQUVIOFUNC, $json );
    }