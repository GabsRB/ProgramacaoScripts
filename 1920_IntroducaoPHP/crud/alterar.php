<?php
include "conecta.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="bg-dark text-info text-center">
    <div class="container mt-2">
        <div class="row">
            <a class="col-sm-2 btn btn-info fw-bold"
            href="incluir.php">Incluir</a>
            <a class="col-sm-2 btn btn-danger fw-bold"
            href="exclui.php">Excluir</a>
            <a class="col-sm-2 offset-sm-1 btn btn-primary
            fw-bold" href="index.php">&#127968;</a>
            <a class="col-sm-2 offset-sm-1 btn btn-warning
            fw-bold" href="alterar.php">Alterar</a>
            <a class="col-sm-2 btn btn-success fw-bold"
            href="exibir.php">Exibir</a>
        </div>
        <div class="row mt-5" id="painel">
            <table class="table col-sm-12 table-dark">
            <thead>
            <tr>
            <th class="col-sm-2">&#8861;ID</th><th
            class="col-sm-3">Nome</th><th
            class="col-sm-3">E-mail</th><th 
            class="col-sm-3">Cidade</th><th class="col-sm-1">UF</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $result = $mysqli->query("SELECT * FROM `clientes`");
                    while ($query = $result->fetch_assoc())
                    {
                        echo "
                            <tr style='font-size:60%;'>
                            <form action='alterar.php' method='post'>
                            <td><input type='submit' value='&#9842;' class='btn-danger'title='excluir'/><input type='number' class='btn-warning' style='width:30%;' name='id' value='".$query["id"]."' /></td>
                            <td><input type='text' name='nome' value='".$query["nome"]."'style='width:80%;' /></td>
                            <td><input type='text' name='email' value='".$query["email"]."'style='width:100%;' /></td>
                            <td><input type='text' name='cidade' value='".$query["cidade"]."'style='width:80%;' /></td>
                            <td><input type='text' name='uf' value='".$query["uf"]."' style='width:80%;'/></td>
                            </form>
                            </tr>
                        ";
                     }
                     if(empty($_POST["nome"])||empty($_POST["email"])||empty($_POST["cidade"])||empty($_POST["uf"])){
                        echo "<p class='text-danger'>Preencha todos os campos corretamente</p>";
                        exit;
                    } 
                    else {
                        $id = $_POST["id"];
                        $nome = $_POST["nome"];
                        $email = $_POST["email"];
                        $cidade = $_POST["cidade"];
                        $uf = $_POST["uf"];
                    }
                    $query = "UPDATE clientes SET
                    nome='$nome', email='$email', cidade='$cidade', uf='$uf'
                    WHERE id='$id';";

        </div>
   
</body>
</html>