<?php
include 'conn.php';

$sql = "SELECT * From TB_CLIENTE";
$stm = $conn->prepare($sql);
$stm->execute();

 
$NOME = $result['NOME_CLIENTE'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h4>Cadastrar Clientes</h4><br>
    <form action="cadCliente.php" method="get">
    <label for="">Nome</label><br>
    <input type="text" name="nome"><br>
    <label for="">Data de nascimento</label><br>
    <input type="date" name="dt_nas"><br>
    <label for="">CPF</label><br>
    <input type="text" name="cpf"><br>
    <label for="">Endereco</label><br>
    <textarea name="end" cols="30" rows="10">
    </textarea><br>
    <input type="submit" value="Cadastrar">    
    </form><br>

    <h4>Lista de clientes</h4><br>
    <table border=1>
        <thead>
            <th>ID</th>
            <th>NOME</th>
            <th>NASCIMENto</th>
            <th>CPF</th>
            <th>ENDERECO</th>    
        </thead>
        <?php while($result = $stm->fetch(PDO::FETCH_ASSOC)) { ?>
        <tbody>
        
        </tbody>
        <?php } ?>    
    </table>
</body>
</html>
