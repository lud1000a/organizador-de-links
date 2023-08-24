<?php
require_once('../connection/conn.php');
session_start();
$c=isset($_SESSION['id']) ? $_SESSION['id'] : false;
if($_SESSION['id']){

}else{
    header('location:../open/log.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<header>
    <div class="media">
    <h1><i class='bx bx-link-alt'></i> Adicionar Links </h1>
    <div class="media-body">
    <button><a href="../index.php">Voltar</a></button>    
    </div>
    </div>
    </header>
<body>
    <center>
    <hr>
    <h2>Quantos Links deseja adicionar?</h2>
    <form action="add_link.php" method="post">
        <input type="number" name="quantidade" min=0 required>
        <button>Enviar</button>
    </form>
    <hr>
    </center>
    <?php
    if($_POST){
        $quant=$_POST['quantidade'];
        if($quant>0){
                echo "<form method='post' action='add_link2.php'>";
            for($x=1; $x<=$quant; $x++){?>
            <div class="d-inline-flex p-2 bd-highlight">
            <h3><?=$x;?></h3>
            <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <div class="itens">
                <hr><br>
                <span> Nome do Link: </span><br>
                <input type='text' name=label[] placeholder='Nome' required><br>
                <span> Link: </span><br>
                <input type='text' name=link[] placeholder='Link' required><br>
                <hr>
            </div>
            </div>
            </div>
            <?php
            }
            echo "<br><button class='btn btn-primary btn-lg btn-block'>Enviar</button>
            </form>";
        }
    }
    ?>
</body>
</html>