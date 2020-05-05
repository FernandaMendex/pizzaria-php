<?php
    
    session_start();
    //Chama essa verificação das informações
    

    print_r($_SESSION);

    //A session resolve o problema de uma possível alteração nos cookies por parte do usuário
    //Confere as informações trazidas do computador do usuário por meio dos cookies
    //Você consegue setar informações em uma página, e processá-las em outras páginas

?>