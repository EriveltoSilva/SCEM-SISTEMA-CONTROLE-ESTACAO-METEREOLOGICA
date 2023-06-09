<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" Cadastro, Estação Metereologica">
    <meta name="author" content="Otlevire">
    <meta name="generator" content="Dashboard Estação">
    <title>EM - Login</title>
    <link rel="stylesheet" href="./estilos/bootstrap.min.css">
    <link rel="stylesheet" href="./estilos/index.css">

    <style>
        form{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container w-75 m-auto">
        <form method="POST" action="./conexao/validarLogin.php" class="row  m-auto p-3 mt-5 shadow rounded">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <h1 class="cabacalho">
                    <img class="logoLogin" src="./imagens/loginIcon.png" alt="Icone Login">
                    Faça o seu Login!                    </h1>
                </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12"></div>
            
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 mt-2 mb-5">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Digite o seu email" required>
            </div>
            
            <div class="col-lg-4 col-md-12 col-sm-12 col-12"></div>
            
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 mt-2 mb-5">
                <label for="senha" class="form-label">Password</label>
                <input type="password" name ="senha" class="form-control" id="senha" placeholder="Digite a sua senha" required>
            </div>
            
            <div class="col-lg-4 col-md-12 col-sm-12 col-12"></div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <button type="submit" class="btn btn-primary w-100" id="botaoEntrar">Entrar</button>
            </div>
        </form>
    </div>
    <script src="./scripts/bootstrap.min.js"></script>
</body>

</html>