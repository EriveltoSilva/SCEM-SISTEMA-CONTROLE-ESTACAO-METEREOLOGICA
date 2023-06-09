<?php
    $ENDERECO_HOST = "localhost";
    $USER_NAME = "root";
    $PASSWORD = "";
    $NOME_DB = "estacao";
    $conexao = mysqli_connect($ENDERECO_HOST,$USER_NAME,$PASSWORD );
    mysqli_select_db($conexao, $NOME_DB);
?>