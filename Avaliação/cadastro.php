<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome=$_POST['nome'];
    $cpf=$_POST['cpf'];
    $idade=$_POST['idade'];

    $handle = fopen("cadastrados.txt", "a");
    fwrite($handle, $nome."\n");
    fwrite($handle, $idade."\n");
    fwrite($handle, $cpf."\n\n");
    fflush($handle);
    fclose($handle);
    
}
?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilo.css">
    <style type="text/css">
        body { font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        
    </div>
    <p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1> </b>Cadastro de pessoas </h1>
            <div class="form-group p-5">
                <input type="text" name="nome" placeholder="Nome" class="" value="">
                <span class="help-block"></span>
            </div>    
        <br>
            <div class="form-group p-5">
                <input type="num" name="idade" placeholder="Idade" class="" value="">
                <span class="help-block"></span>
            </div>
        <br>
            <div class="form-group p-5">
                    <input type="num" name="cpf" placeholder="CPF" class="" value="">
                    <span class="help-block"></span>
                </div>    
        <br><br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </div>
        <br><br>
            <a href="dados_cadastrados.php" class="btn btn-danger">Cadastrados</a>
        <br><br>
            <a href="welcome.php" class="btn btn-danger">Voltar</a>
        <br><br>
            <a href="index.php" class="btn btn-danger">Sair</a>
        </form>

        <br><br>

    </p>
</body>
</html>