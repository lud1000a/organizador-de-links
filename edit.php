<?php
require_once('connection/conn.php');
session_start();

$id = isset($_GET['link']) ? $_GET['link'] : false;

if(!$id) {
    header('location: ../index.php?code=not_found');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
<hr>
<center>
    <h1>Editar</h1>
    <form action="controllers/link-edit.php" method="post">
        <?php
        if(@$_SESSION['t']===1){
            $sql= $connect -> query("SELECT * FROM user WHERE id_user=$id");
        if($sql->num_rows>0){
            while($row = $sql->fetch_assoc()){
            echo"
            <div class='form-group'>
            <label for='formGroupExampleInput'>Nome</label>
            <input type='text' value=".$row['name']." name='name' class='form-control' id='formGroupExampleInput' placeholder='' required></br>
            </div>
            <div class='form-group'>
            <label for='formGroupExampleInput'>Login</label>
            <input type='text' value=".$row['login']." name='login' class='form-control' id='formGroupExampleInput' placeholder='' required></br>
            </div>
            <div class='form-group'>
            <label for='formGroupExampleInput'>Senha</label>
            <input type='password' name='pw' class='form-control' id='formGroupExampleInput' placeholder='' required></br>
            </div>
            <input type='hidden' value=".$id." name='id'>
            ";
            }
        }
        }elseif($_SESSION['t']===2){
        $sql= $connect -> query("SELECT * FROM links WHERE id_link=$id");
        if($sql->num_rows>0){
            while($row = $sql->fetch_assoc()){
            echo"
            <div class='form-group'>
            <label for='formGroupExampleInput'>Nome</label>
            <input type='text' value=".$row['label']." name='label' class='form-control' id='formGroupExampleInput' placeholder='' required></br>
            </div>
            <div class='form-group'>
            <label for='formGroupExampleInput'>Nome</label>
            <input input type='text' value=".$row['link']." name='link' class='form-control' id='formGroupExampleInput' placeholder='' required></br>
            </div>
            <input type='hidden' value=".$id." name='id'>
            ";
            }
        }
    }
        ?>
<center><button button class="btn btn-secondary btn-lg btn-block">Alterar</button><br>
    <button class='btn btn-primary btn-lg btn-block'><a href="index.php" class='voltar'>Voltar</a></button></center>
</center>
    </form>
    <hr>
</div>
</body>
</html>