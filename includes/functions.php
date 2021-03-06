<?php 
    
    /**
     * Defina uma função que receba um id numérico e retorne a
     * pizza que tem como id este que foi dado
     */
    function pizzaPorId($id){

        // Trazer o array de pizzas aqui para dentro!
        global $pizzas;

        // Realizar o 'for' procurando a pizza que tem o id igual a $id
        foreach ($pizzas as $pizza) {
            if($pizza["id"] == $id){
                return $pizza;
            }
        }

        // Terminando o for, se não encontrar pizza nenhuma, retornar false
        return false;
    }

    /**
     * Defina uma função que retorne um array com as pizzas
     * de destaque. Dica: $vetor[] = 3 adiciona o número 3
     * na última posição de $vetor
     */
    function pizzasComDestaque(){

        // Trazer o array de pizzas aqui para dentro!
        global $pizzas;

        // Criando um array vazio para guardar as pizzas em destaque
        $comDestaque = [];

        // Realizar o 'for' procurando as pizzas em destaque
        foreach ($pizzas as $pizza) {

            // Se a pizza for destaque...
            if($pizza["destaque"]){

                // ... adicionar ela ao array $emDestaque
                $comDestaque[] = $pizza;

            }
        }

        // Terminando o for! Devemos retornar todas as pizzas em destaque
        return $comDestaque;
        
    }

     /**
     * Defina uma função que retorne um array com as pizzas
     * de destaque. Dica: $vetor[] = 3 adiciona o número 3
     * na última posição de $vetor
     */
    function pizzasSemDestaque(){
        // Trazer o array de pizzas aqui para dentro!
        global $pizzas;

        // Criando um array vazio para guardar as pizzas em destaque
        $semDestaque = [];

        // Realizar o 'for' procurando as pizzas em destaque
        foreach ($pizzas as $pizza) {

            // Se a pizza for destaque...
            if(!$pizza["destaque"]){

                // ... adicionar ela ao array $emDestaque
                $semDestaque[] = $pizza;

            }
        }

        // Terminando o for! Devemos retornar todas as pizzas em destaque
        return $semDestaque;
    }

    /**
     * Defina uma função que retorne a pizza mais cara do menu
     * Essa função não recebe nenhum parâmetro.
     * Ela acessar a variável $pizzas utilizando o global
     */
    function pizzaMaisCara(){
        // Trazer o array de pizzas aqui para dentro!
        global $pizzas;

        // Verificando se existem pizzas no array de pizzas
        if(!$pizzas){
            return false;
        }

        // Realizar o 'for' procurando a pizza mais cara
        $maisCara = $pizzas[0];
        for ($i=1; $i < count($pizzas); $i++) {
            $pizza = $pizzas[$i];

            if($pizza["preco"] > $maisCara["preco"]){
                $maisCara = $pizza;
            }
        }

        // Terminando o for retornando a pizza que for mais cara
        return $maisCara;
    }

    /**
     * Defina uma função que retorne a pizza mais barata do menu
     * Essa função não recebe nenhum parâmetro.
     * Ela acessar a variável $pizzas utilizando o global
     */
    function pizzaMaisBarata(){
        // Trazer o array de pizzas aqui para dentro!
        global $pizzas;

        // Verificando se existem pizzas no array de pizzas
        if(!$pizzas){
            return false;
        }

        // Realizar o 'for' procurando a pizza mais cara
        $maisBarata = $pizzas[0];
        for ($i=1; $i < count($pizzas); $i++) {
            $pizza = $pizzas[$i];

            if($pizza["preco"] < $maisBarata["preco"]){
                $maisBarata = $pizza;
            }
        }

        // Terminando o for retornando a pizza que for mais cara
        return $maisBarata;
    }

    /**
     * Defina uma função que recebe o trecho de nome de uma pizza
     * e retorna um array contendo todas as pizzas que contenham
     * o trecho
     */
    function buscaPizza($trecho){
        global $pizzas;
        $resultado = [];
        foreach ($pizzas as $pizza){
            if (stripos ($pizza['nome'], $trecho) !== false){
                $resultado[] = $pizza;
            }
        }
        return $resultado;
    }

     /**
     * Defina uma função que impima as informações de uma pizza
     */
    function pizzaPrint($pizza){}

    // Carrega os usuários do arquivo usuarios.json e retorna um array associativo contendo os usuários

    function carregaUsuarios(){
        // -Ler o arquivo para uma variável string 
        $strJson = file_get_contents("../includes/usuarios.json");

        // -Transformar a string em array associativo 
        $usuarios = json_decode($strJson, true);

        // -Retornar o array associativo
        return $usuarios;
    }
        
    function addUsuario($nome, $telefone, $email, $endereco, $senha, $imagem){
        // -Carrega os usuários para $usuarios
        $usuarios = carregaUsuarios();

        // -Cria um array assoc $u com os dados passados por parâmetro
        $u = ['nome'=>$nome, 'telefone'=>$telefone, 'email'=>$email, 'endereco'=>$endereco, 'senha'=>password_hash($senha, PASSWORD_DEFAULT) , 'imagem'=>$imagem];
        //Guardando senha criptografada

        // -Adiciona $u ao final do array usuarios
        $usuarios[] = $u;

        // -Transforma o array de usuários de volta em string json
        $stringjson = json_encode($usuarios);

        // -Verificando se existe algum caractere na stringjason, se tiver, salva no arquivo usuarios.json

        if($stringjson){           

            // -Salva a string json no arquivo usuarios.json 
            file_put_contents('../includes/usuarios.json', $stringjson);
        }
    }

?>