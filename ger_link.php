<?php
require_once('connection/conn.php');
require_once('partials/list_errors.php');
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
</head>
<header>
    <div class="media">
    <h1><i class='bx bx-link-alt'></i> Gerenciar Links </h1>
    <div class="media-body">
    <button><a href="index.php">Voltar</a></button>    
    </div>
    </div>
    </header>
<body>
<center>
    <form action="ger_link.php" method="post">
        <input type="search" name="pesquisa" placeholder="Pesquise por um link" required><button><i class='bx bx-search-alt-2' ></i></button>
    </form>
</center>
    <?php
    $_SESSION['t']=2;
    if($_POST){
        $pesquisa= $_POST['pesquisa'];
        $id=$_SESSION['id'];
        $sql= $connect -> query("SELECT * FROM links WHERE link or label LIKE '%$pesquisa%'");
        if($sql->num_rows>0){
            while($row = $sql->fetch_assoc()){
                if($row['id_user']===$id){ ?>
                    <div class="d-inline-flex p-2 bd-highlight">
                    <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="itens">
                        <span>Nome: </span> <span><?= $row['label']; ?><span><br>
                        <span>Link: </span><span><?= $row['link']; ?><span><br>
                            <center><a href="controllers/link-delete.php?link=<?= $row['id_link']; ?>">Deletar</a><br>
                            <a href="edit.php?link=<?= $row['id_link']; ?>">Alterar</a></center>
                    </div>
                    </div>
                    </div>
                <?php
                }  
            }
        }else{
            echo "Nenhum resultado encontrado";
        }
    }
    ?>
    <hr>
<center>
    <?php require_once('partials/list_links.php'); ?>
</center>
</body>
</html>