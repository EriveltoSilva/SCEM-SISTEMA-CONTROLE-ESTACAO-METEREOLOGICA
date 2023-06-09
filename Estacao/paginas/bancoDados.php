<!DOCTYPE html>
<html lang="pt-pt">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Otlevire">
	<title>Estação · Banco de Dados</title>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../estilos/bootstrap.min.css">
	<link rel="stylesheet" href="../estilos/bancoDados.css">
	<style>
		body {
			background-image: url('../imagens/fundo.jpg');
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>

	<script src="../scripts/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex flex-column h-100">
	<header>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Estação Metereologica > BD</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
					aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav me-auto mb-2 mb-md-0">
						<li class="nav-item">
							<a class="nav-link " aria-current="page" href="./principal.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../index.php">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./cadastro.php">Cadastro</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="bancoDados.php">Banco de Dados</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<section id="content">

		<main class="flex-shrink-0">
			<div class="head-title">
				<div class="left">
					<h2 class="text-light">Banco de Dados da Estação</h2>
				</div>
			</div>
			<div class="btn-group">
				<button type="button" class="btn   btn-danger dropdown-toggle" data-bs-toggle="dropdown"
					aria-expanded="false">
					Selecione o que Deseja Consultar...
				</button>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="bancoDados.php?sensor=dht11">Dados do S.DHT11</a></li>
					<li><a class="dropdown-item" href="bancoDados.php?sensor=chuva">Dados do S.Chuva</a></li>
					<li><a class="dropdown-item" href="bancoDados.php?sensor=solo">Dados do S.Solo</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="bancoDados.php?sensor=geral">Geral</a></li>
				</ul>
			</div>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Dados Armazenados</h3>
					</div>

					<table>
						<thead>
							<?php
							
								if(isset($_GET["sensor"]))
								{
									$sensor= $_GET["sensor"];
									$query="";
									$tipo ='z';
									echo "<th>NºRegistro</th>";
									if($sensor=="chuva")
									{
										$tipo ='c';
										$query = "select id, nivel_chuva, sensor_chuva, data from tbl_dados_sensores;";
										echo "<th>N.Chuva</th>";
										echo "<th>V. Sen Chuva</th>";
									}
									if($sensor=="solo")
									{
										$tipo ='s';
										$query = "select id, nivel_solo, sensor_solo, data from tbl_dados_sensores;";
										echo "<th>N.Solo</th>";
										echo "<th>V. Sen Solo</th>";
									}
									if($sensor=="dht11")
									{
										$tipo ='d';
										$query = "select id, nivel_temperatura, sensor_temperatura, nivel_humidade, sensor_humidade,data from tbl_dados_sensores;";
										echo "<th>N. Temp.</th>";
										echo "<th>V. Sen.Temp</th>";
                    echo "<th>N. Humid.</th>";
										echo "<th>V. Sen.Humid.</th>";
									}

									if($sensor=="geral")
									{
										$tipo ='g';
										$query = "select * from tbl_dados_sensores;";
										echo "<th>N.Chuva</th>";
										echo "<th>V. Sen Chuva</th>";
										echo "<th>N.Solo</th>";
										echo "<th>V. Sen Solo</th>";
										echo "<th>N. Temp.</th>";
										echo "<th>V. Sen Temp.</th>";
                    echo "<th>N. Hum.</th>";
										echo "<th>V. Sen Hum.</th>";
									}
									echo "<th>Data e Hora</th>";

								
									
							?>
						</thead>
						<tbody>
							<?php
									
									
									function query_chuva($query)
									{
										include "../conexao/conexaoDB.inc";

										$resultado=mysqli_query($conexao, $query);
										while($linha= mysqli_fetch_row($resultado))
										{
											$id= $linha[0];
											$nivel_chuva= $linha[1];
											$sensor_chuva= $linha[2];
											$data=$linha[3];
											echo "<tr>";
												echo "<td>$id</td>";
												echo "<td>$nivel_chuva</td>";
												echo "<td>$sensor_chuva</td>";
												echo "<td>$data</td>";
											echo "</tr>";
										}
										mysqli_close($conexao);
									}
									function query_solo($query)
									{
										include "../conexao/conexaoDB.inc";

										$resultado=mysqli_query($conexao, $query);
										while($linha= mysqli_fetch_row($resultado))
										{
											$id= $linha[0];
											$nivel_solo= $linha[1];
											$sensor_solo= $linha[2];
											$data=$linha[3];
											echo "<tr>";
												echo "<td>$id</td>";
												echo "<td>$nivel_solo</td>";
												echo "<td>$sensor_solo</td>";
												echo "<td>$data</td>";
											echo "</tr>";
										}
										mysqli_close($conexao);
									}
									function query_dht11($query)
									{
										include "../conexao/conexaoDB.inc";
										$query = "select id, nivel_temperatura, sensor_temperatura, nivel_humidade, sensor_humidade,data from tbl_dados_sensores;";

										$resultado=mysqli_query($conexao, $query);
										while($linha= mysqli_fetch_row($resultado))
										{
											$id = $linha[0];
											$nivel_temperatura= $linha[1];
											$sensor_temperatura= $linha[2];
											$nivel_humidade= $linha[3];
											$sensor_humidade= $linha[4];
											$data=$linha[5];
											echo "<tr>";
												echo "<td>$id</td>";
												echo "<td>$nivel_temperatura</td>";
												echo "<td>$sensor_temperatura</td>";
												echo "<td>$nivel_humidade</td>";
												echo "<td>$sensor_humidade</td>";
												echo "<td>$data</td>";
											echo "</tr>";
										}
										mysqli_close($conexao);
									}
									function query_geral($query)
									{
										include "../conexao/conexaoDB.inc";

										$resultado=mysqli_query($conexao, $query);
										while($linha= mysqli_fetch_row($resultado))
										{
											$id= $linha[0];
											$nivel_chuva= $linha[1];
											$sensor_chuva= $linha[2];
											$nivel_solo= $linha[3];
											$sensor_solo= $linha[4];
											$nivel_temperatura= $linha[5];
											$sensor_temperatura= $linha[6];
											$nivel_humidade= $linha[7];
											$sensor_humidade= $linha[8];
											$data=$linha[9];
											echo "<tr>";
												echo "<td>$id</td>";
												echo "<td>$nivel_chuva</td>";
												echo "<td>$sensor_chuva</td>";
												echo "<td>$nivel_solo</td>";
												echo "<td>$sensor_solo</td>";
												echo "<td>$nivel_temperatura</td>";
												echo "<td>$sensor_temperatura</td>";
												echo "<td>$nivel_humidade</td>";
												echo "<td>$sensor_humidade</td>";
												echo "<td>$data</td>";
											echo "</tr>";
										}
										mysqli_close($conexao);
									}
									
									if($tipo=='c')
										query_chuva($query);
									else if($tipo=='s')
										query_solo($query);
									else if($tipo=='d')
                                        query_dht11($query);
									else if($tipo=='g')
										query_geral($query);
								}
								?>
						</tbody>
					</table>

				</div>

			</div>
		</main>
	</section>

	<script src="../scripts/jquery.js"></script>
</body>

</html>