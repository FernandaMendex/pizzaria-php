<?php
    setcookie("vendedor", "Murillo", 0, "/", "");
    //Principais configurações:
    //expires: Tempo de validade do cookie (0: é jogado fora assim que o visitante fecha o navegador)
    //path: "/": vale para todo o site, vazio, " ":daquela pasta em diante
    //domain: se você não setar, ficará o domínio do seu sistema

    setcookie("valor", "100");
    setcookie("aparelho", "MotoG8");

    //Envia o cookie para o usuário
    //O primeiro parâmetro é o nome do cookie, o segundo é o valor
    //Essa funçao retorna um booleano 
    //De maneira geral, os cookies servem para guardar informações (não sensíveis dos usuários), como preferências de cor ou produtos

?>

Cookies setados!