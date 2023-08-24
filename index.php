<?php
require_once('connection/conn.php');
session_start();

$c=isset($_SESSION['id']) ? $_SESSION['id'] : false;
if($_SESSION['id']){

}else{
    header('location:open/log.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <header>
    <div class="media">
    <h1><i class='bx bxs-user' ></i> <?php echo $_SESSION['name']; ?></h1>
    <div class="media-body">
    <button><a href="controllers/add_link.php">Adicionar Link</a></button>
    <button><a href="ger_link.php">Gerenciar Links</a></button>
    <button><a href="ger_conta.php">Gerenciar Minha Conta</a></button>
    <button><a href="link/gerar_link.php">Gerar link</a></button>
    <button><a href="open/logout.php">Sair</a></button>
    </div>
    </div>
    </header>
</head>
<body>
    <?php $_SESSION['t']=2;
    require_once('partials/list_errors.php'); ?>

    <center>
    <?php require_once('partials/list_links.php'); ?>
    </center>
</body>

</html>