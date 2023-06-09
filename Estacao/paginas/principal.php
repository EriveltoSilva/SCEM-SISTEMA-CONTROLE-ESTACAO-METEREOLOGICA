<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Otlevire">
  <title>Estação · Menu Principal</title>
  
  <link href='../estilos/fontawesome/css/all.min.css' rel='stylesheet'>
  <link href='../estilos/fontawesome/css/fontawesome.min.css' rel='stylesheet'>
  <link href="../estilos/bootstrap.min.css" rel="stylesheet">
  <link href="../estilos/principal.css" rel="stylesheet">

  <style>
    .todo img{
      width:100%;
    }
    .icone{
      font-size: xx-large;
      color:#317dda;
    }
  </style>
</head>

<body class="d-flex flex-column h-100">
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Estação Metereologica</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="./cadastro.php">Cadastro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./bancoDados.php">Banco de Dados</a>
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
          <h2 class="text-primary mt-5">Dashboard da Estação</h2>
        </div>
      </div>

      <ul class="box-info">
        <li>
          <img id="imagemTemperatura" src="../imagens/imagemTemperatura.jpeg" alt="">
          <span class="text">
            <h3 id="nivelTemperatura">---</h3>
            <p>Nível de Temperatura</p>
          </span>
        </li>

        <li>
          <i class="fa-solid fa-temperature-three-quarters icone"></i>
          <span class="text">
            <h3 id="sensorTemperatura">---</h3>
            <p>Sensor de Temperatura</p>
          </span>
        </li>


        <li>
          <img id="imagemHumidade" src="../imagens/imagemHumidade.jpg" alt="">
          <span class="text">
            <h3 id="nivelHumidade">---</h3>
            <p>Nível de Humidade</p>
          </span>
        </li>
        <li>
          <i class="fa-solid fa-wind icone"></i>
          <span class="text">
            <h3 id="sensorHumidade">---</h3>
            <p>Sensor de Humidade</p>
          </span>
        </li>
        


        <li>
          <img src="../imagens/imagemSolo.jpg" alt="">
          <span class="text">
            <h3 id="nivelSolo">---</h3>
            <p>Nível de Solo</p>
          </span>
        </li>
        <li>
          <i class="fa-solid fa-seedling icone"></i>
          <span class="text">
            <h3 id="sensorSolo">---</h3>
            <p>Sensor de Solo</p>
          </span>
        </li>
        
        <li>
          <img id="imagemChuva" src="../imagens/chuvaSEM_CHUVA.png" alt="">
          <span class="text">
            <h5 id="nivelChuva">---</h5>
            <p>Nível de Chuva</p>
          </span>
        </li>
        <li>
          <i class="fa-solid fa-cloud-rain icone"></i>
          <span class="text">
            <h3 id="sensorChuva">---</h3>
            <p>Sensor de Chuva</p>
          </span>
        </li>

      </ul>

      <div class="table-data">
        <div class="todo">
          <img src="../imagens/estacao.png" alt=""  >
        </div>
      </div>
    </main>
  </section>


  <script src="../scripts/bootstrap.min.js"></script>
  <script>
    let timer;
    window.addEventListener ("load", function(){
      setInterval(() => {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            let dadosRecebidos = this.responseText.split('*');
            document.getElementById("nivelChuva").innerHTML=dadosRecebidos[1];
            document.getElementById("sensorChuva").innerHTML=dadosRecebidos[2];
            document.getElementById("nivelSolo").innerHTML=dadosRecebidos[3];
            document.getElementById("sensorSolo").innerHTML=dadosRecebidos[4];
            document.getElementById("nivelTemperatura").innerHTML=dadosRecebidos[5];
            document.getElementById("sensorTemperatura").innerHTML=dadosRecebidos[6];
            document.getElementById("nivelHumidade").innerHTML=dadosRecebidos[7];
            document.getElementById("sensorHumidade").innerHTML=dadosRecebidos[8];
            console.log(dadosRecebidos);
          }
        }
        xmlhttp.open("GET", "./getDados.php?dados=", true);
        xmlhttp.send();
      }, 700);
    });
  </script>
</body>

</html>