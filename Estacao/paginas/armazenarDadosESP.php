<?php
    include "../conexao/conexaoDB.inc";
    if(isset($_GET["nivelChuva"]) && isset($_GET["sensorChuva"]) && 
       isset($_GET["nivelSolo"]) && isset($_GET["sensorSolo"]) && 
       isset($_GET["nivelTemperatura"]) && isset($_GET["sensorTemperatura"]) &&
       isset($_GET["nivelHumidade"]) && isset($_GET["sensorHumidade"]))
    
    {
        $nivelChuva=$_GET["nivelChuva"];
        $sensorChuva=$_GET["sensorChuva"];
        $nivelSolo=$_GET["nivelSolo"];
        $sensorSolo=$_GET["sensorSolo"];
        $nivelTemperatura=$_GET["nivelTemperatura"];
        $sensorTemperatura=$_GET["sensorTemperatura"];
        $nivelHumidade=$_GET["nivelHumidade"];
        $sensorHumidade=$_GET["sensorHumidade"];
        $salvar=$_GET["salvar"];

        if($salvar=="1")
        {
            $query= "insert into tbl_dados_sensores VALUES (DEFAULT, '$nivelChuva', '$sensorChuva', '$nivelSolo', '$sensorSolo', '$nivelTemperatura', '$sensorTemperatura', '$nivelHumidade','$sensorHumidade', now() )";
            if(mysqli_query($conexao, $query))
                echo "Novo registro inserido!";
            else
                echo "Error:" . $query."<br/>". mysqli_error($conexao);
        }
        else
        {
            $query= "UPDATE tbl_dados_sensores set nivel_chuva='$nivelChuva', sensor_chuva='$sensorChuva', nivel_solo='$nivelSolo', sensor_solo='$sensorSolo', nivel_temperatura='$nivelTemperatura', sensor_temperatura='$sensorTemperatura', nivel_humidade='$nivelHumidade', sensor_humidade='$sensorHumidade' where id=4;";
            if(mysqli_query($conexao, $query))
                echo "Update feito!";
            else 
                echo "Update falhou!";
        }        
    }
    mysqli_close($conexao);
?>