<?php
    include "conexaoDB.inc";
    if(isset($_POST['email']) && isset($_POST['senha']))
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $query = "select * from tbl_usuario where email='$email' and senha='$senha';";
        $resultado = mysqli_query($conexao, $query);
        $numeroLinhas = mysqli_affected_rows($conexao);
        if($numeroLinhas>0)
        {
            $idSeccao = rand(100000,900000);
            setcookie("idCookie", $idSeccao);
            if(isset($_COOKIE["ab"]))
                echo "<script>window.alert('Usuario e Senha verificados com Sucesso!Bem Vindo!');</script>";
            echo "<script>window.location.assign('../paginas/principal.php');</script>";
        }
        else{
            echo "<script>window.alert('Usuario ou Senha Errado!\nTente novamente!');</script>";
            header("Location:../index.php");
            die();
        }
    }
    mysqli_close($conexao);
?>

