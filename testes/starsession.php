<?php

    session_start();
    //Chama essa verificação das informações

    $_SESSION['vendedor'] = "Danilo";
    $_SESSION['valor'] = 500;
    $_SESSION['aparelho'] = "Iphone Mega Blaster";
    //Essas informações estão no servidor

    //No navegador apareceu um novo cookie, uma sequência de caracteres que identificam o usuário

?>