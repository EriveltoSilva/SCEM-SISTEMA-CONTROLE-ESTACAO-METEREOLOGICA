<?php
	include "../conexao/conexaoDB.inc";

	$nivelChuva= "12";
	$sensorChuva= "13";
	$nivelSolo= "14";
	$sensorSolo= "15";
	$nivelTemperatura= "16";
	$sensorTemperatura= "17";
	$nivelHumidade= "18";
	$sensorHumidade= "19";
	

	$query = "select * from tbl_dados_sensores where id=4;";
	$resultado=mysqli_query($conexao, $query);
	while($linha= mysqli_fetch_row($resultado))
	{
		$nivelChuva= $linha[1];
		$sensorChuva= $linha[2];
		$nivelSolo= $linha[3];
		$sensorSolo= $linha[4];
		$nivelTemperatura= $linha[5];
		$sensorTemperatura= $linha[6];
		$nivelHumidade= $linha[7];
		$sensorHumidade= $linha[8];
	}
	mysqli_close($conexao);
	
    if(isset($_GET["dados"]))    
        echo "BD*$nivelChuva*$sensorChuva*$nivelSolo*$sensorSolo*$nivelTemperatura*$sensorTemperatura*$nivelHumidade*$sensorHumidade*";
    
?>