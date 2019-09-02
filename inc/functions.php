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
    define('ARQUIVOFUNC','funcionarios.json');

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
        $hash = password_hash ($senha,PASSWORD_DEFAULT);

        // Adicionando um funcionário ao JSON
        $funcionarios[] = [
            'nome' => $nome,
            'email' => $email,
            'senha' => $hash
        ];
        
        // Codificando o arquivo em json
        $json = json_encode($funcionarios);

        // Salvar a string no json
        file_put_contents(ARQUIVOFUNC, $json );
    }

        // Validação
        function errosCadastro() {
            $erros = [];
            // Definindo erro no nome, se não for definido ou for nulo
            if(!isset($_POST['nome']) || $_POST['nome'] == '' ){
                // Adicionando uma string identificando erro no nome ao array erros
                $erros[] = 'errNome';
            }
            // Definindo erro no email, se nã ofor definido ou for nulo
            if(!isset($_POST['email']) || $_POST['email'] == ''){
                // Adicionando strin ao array erros
                $erros[] = 'errEmail';
            }
            // Definindo erro na senha, se não for definida ou nula
            if(!isset($_POST['senha']) || $_POST['senha'] == ''){
                // Adicionando string ao array erros
                $erros[] = 'errSenha';
            }
            // Definindo erro na Confirmação de Senha
            // Será true se a confSenha e Senha não baterem e o campo conf for preenchido
            if( $_POST['confSenha'] != $_POST['senha'] && isset($_POST['conf']) ){
                // Adicionando string ao array erros
                $erros[] = 'errConf';
            }
            return $erros;
        }

    // ------------ LOGIN -------------------

    function logar($email,$senha){
        // carregar base de dados funcionários
        $funcionarios = getFuncionarios();

        // Procurar funcionário com o email dado
        $achou = false;
        foreach ($funcionarios as $f) {
            if($f['email'] == $email){
                $achou = true;
                break;
                // break interrompe o foreach/LOOP, não o script
            }
        }

        // garantindo que retornará erro se não encontrar o email
        if(!$achou) {
            return false;
        } else {
            $senhaOK = password_verify($senha,$f['senha']);
            // retornando falso se a senha não bater
            return $senhaOK;
        }
    }
    