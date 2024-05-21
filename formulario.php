<?php

    $obj_mysql = mysqli_connect("127.0.0.1","root","","db_supermercado");
    if (!$obj_mysql) {
        echo 'Erro ao conectar ao Banco de Dados';
        exit;
    }

    if(isset($_POST["nome_prod"]) && isset($_POST["desc_prod"]) && isset($_POST["peso_prod"]) && isset($_POST["data_prod"]) && isset($_POST["val_prod"])) 
    {
        if(empty($_POST["nome_prod"]))
        {
            echo "Nome do Produto Campo Vazio";
        }
        else if(empty($_POST["desc_prod"]))
        {
            echo "Descrição Campo Vazio";
        }
        else if(empty($_POST["peso_prod"]))
        {
            echo "Peso do Produto Campo vazio";
        }
        else if(empty($_POST["data_prod"]))
        {
            echo "Data do Produto Campo vazio";
        }
        else if(empty($_POST["val_prod"]))
        {
            echo "Valor do produto Campo vazio";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <Style>
        th{
            padding: 3px;
            font-size: 20px;
            font-family: Arial, Helvetica;
        }
        td{
            padding: 5px;
            font-size: 18px;
            margin-left: auto;
            margin-right: auto;
            font-family: Arial, Helvetica;
        }
        h2{
            display:flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, Helvetica, bold;
        }
    </Style>
</head>
<body>
    <h1>Inserir Produtos</h1>

    <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
      
        <label for="nome_prod">Nome do Produto:</label><br>
        <input type="text" maxlength="30" name="nome_prod" id="nome_prod"><br><br>
        
        <label for="desc_prod">Descrição do Produto:</label><br>
        <input type="text" maxlength="50" name="desc_prod" id="desc_prod"><br><br>

        <label for="peso_prod">Unidade do Produto:</label><br>
        <input type="text" maxlength="3" name="peso_prod" id="peso_prod"><br><br>

        <label for="data_prod">Data de entrega:</label><br>
        <input type="date" name="data_prod" id="data_prod"><br><br>
        
        <label for="val_prod">Valor do Produto (unitário):</label><br>
        <input type="number" step="0000000000.001" name="val_prod" id="val_prod"><br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Limpar">
    </form>
    <br>
    <br>
    <table width="55%" border="1" cellspacing="0">
        <tr>
        <div style="width: 50%;">    
            <h2>Tabela Produto</h2>
        </div>
            <th><strong>ID</strong></th>
            <th><strong>Nome</strong></th>
            <th><strong>Descrição</strong></th>
            <th><strong>Unidade</strong></th>
            <th><strong>Data de entrega</strong></th>
            <th><strong>Valor</strong></th>
        </tr>
        
    <?php  

    $resultado = $obj_mysql -> query("SELECT * FROM `produtos`");
    while ($aux_produtos = $resultado -> fetch_assoc())
    {
        echo '<tr>';
        echo '<td>'.$aux_produtos["id_prod"].'</td>';
        echo '<td>'.$aux_produtos["nome_prod"].'</td>';
        echo '<td>'.$aux_produtos["desc_prod"].'</td>';
        echo '<td>'.$aux_produtos["peso_prod"].'</td>';
        echo '<td>'.$aux_produtos["data_prod"].'</td>';
        echo '<td>'.$aux_produtos["val_prod"].'</td>';
        echo '</tr>';
    }   
    ?>
    </table>
</body>
</html>