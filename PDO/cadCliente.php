<?php
include 'conn.php';

$sql = "SELECT * From TB_CLIENTE";
$stm = $conn->prepare($sql);
$stm->execute();

//Inserindo dados
if(empty($_POST['nome']) || empty($_POST['dt_nas'])){
    echo  "Preencha todos os campos!";
}else{
    $insert = "INSERT INTO
    TB_CLIENTE(NOME_CLIENTE,DT_NASCIMENTO,CPF,ENDERECO) 
    Values(:nome,:dt_nas,:cpf,:ende)";
    $sti = $conn->prepare($insert);
    $sti->bindParam(':nome',$_POST['nome']);
    $sti->bindParam(':dt_nas',$_POST['dt_nas']);
    $sti->bindParam(':cpf',$_POST['cpf']);
    $sti->bindParam(':ende',$_POST['end']);

    if($sti->execute()){
        header('Location: cadCliente.php');
    }else{
        print_r($sti->errorInfo());
    }    
}

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
    <form action="cadCliente.php" method="post">
    <label for="">Nome</label><br>
    <input type="text" name="nome"><br>
    <label for="">Data de nascimento</label><br>
    <input type="date" name="dt_nas"><br>
    <label for="">CPF</label><br>
    <input type="text" name="cpf"><br>
    <label for="">Endereco</label><br>
    <textarea name="end" cols="30" rows="1">
    </textarea><br>
    <input type="submit" value="Cadastrar">    
    </form><br>

    <h4>Lista de clientes</h4><br>
    <table border=1>
        <thead>
            <th>ID</th>
            <th>NOME</th>
            <th>NASCIMENTO</th>
            <th>CPF</th>
            <th>ENDERECO</th>    
        </thead>
        <?php while($result = $stm->fetch(PDO::FETCH_ASSOC)) { 
        ?>
        <tbody>
        <td><?php echo $result['ID_CLIENTE']; ?></td>
        <td><?php echo $result['NOME_CLIENTE']; ?></td>
        <td><?php echo $result['DT_NASCIMENTO']; ?></td>
        <td><?php echo $result['CPF']; ?></td>
        <td><?php echo $result['ENDERECO']; ?></td>
        </tbody>
        <?php } ?>    
    </table>
</body>
</html>
