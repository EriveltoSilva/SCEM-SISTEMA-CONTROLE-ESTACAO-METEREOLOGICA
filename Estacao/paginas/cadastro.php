<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" Cadastro, Estação Metereologica">
    <meta name="author" content="Otlevire">
    <meta name="generator" content="Dashboard Estação">
    <title>EM - Cadastro</title>
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
</head>

<body>

    <div class="container w-75 m-auto">
        <div class="row mb-5">
            <h1 class="cabacalho">
                <img class="logoLogin" src="../imagens/loginIcon.png" alt="Icone Login" width="50" height="50">
                Cadastre-se!
            </h1>
        </div>

        <form  class="row g-3" action="../conexao/validarCadastro.php" method = "POST" id="formCadastro" class="form">

            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Digite o seu email" required>
            </div>

            <div class=" col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username"  class="form-control" id="username" placeholder="Digite o seu username" >
            </div>

            <div class=" col-md-6">
                <label for="primeiroNome" class="form-label">Primeiro Nome</label>
                <input type="text" name="primeiroNome"  class="form-control" id="primeiroNome" placeholder="Digite o seu nome próprio"
                    required>
            </div>

            <div class=" col-md-6">
                <label for="sobreNome" class="form-label">Sobrenome</label>
                <input type="text" name="sobreNome"  class="form-control" id="sobreNome" placeholder="Digite o seu último nome" required>
            </div>

            <div class=" col-md-6">
                <label for="tefone" class="form-label">Telefone</label>
                <input type="tel" name="telefone"  class="form-control" id="telefone" placeholder="Digite o seu telefone">
            </div>

            <div class="col-md-6">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" name="endereco"  class="form-control" id="endereco" placeholder="Digite o seu endereço">
            </div>

            <div class="col-md-6">
                <label for="senha" class="form-label">Password</label>
                <input type="password" name="senha1"  class="form-control" id="senha" placeholder="Digite a sua senha" required>
            </div>
            <div class="col-md-6">
                <label for="senha" class="form-label">Confirmação da Password</label>
                <input type="password" name="senha2"  class="form-control" id="senha" placeholder="Confirme a sua senha" required>
            </div>

            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input"  type="radio" name="genero" id="genero" value="Femenino">
                    <label class="form-check-label" for="genero">
                        Femenino
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input"  type="radio" name="genero" id="genero" value="Masculino" checked>
                    <label class="form-check-label" for="genero">
                        Masculino
                    </label>
                </div>
            </div>

            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="../index.php" class="btn btn-primary">Voltar Login</a>
            </div>
        </form>
    </div>
    <script src="../scripts/jquery.min.js"></script>
    <script src="../scripts/bootstrap.min.js"></script>
</body>

</html>