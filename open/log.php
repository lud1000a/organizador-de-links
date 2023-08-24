<?php
require_once('../connection/conn.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
<div class="container">
    <hr>
    <center>
    <h1>Login</h1><span>Não tem uma conta? <a href="cad.php">Cadastre-se</a>
    </center>
    <form action="log.php" method="post">
    <div class="form-group">
        <label for="formGroupExampleInput">Login</label>
        <input type="email" name="login" class="form-control" id="formGroupExampleInput" placeholder="" required></br>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput">Senha</label>
        <input type="password" name="password" class="form-control" id="formGroupExampleInput" placeholder="" required></br>
    </div>
    <center><button class='btn btn-primary btn-lg btn-block'>Enviar</button></center>
    </form>
    <hr>
</div>
</body>
</html>
<?php
if($_POST){
    $login= $_POST['login'];
    $pass= $_POST['password'];
    $password= crypt($pass, 'rl');

    $res= $connect->query("SELECT * FROM user WHERE login='$login' and password='$password'");
    if($res -> num_rows > 0){
        while($row = $res -> fetch_assoc()){
            $_SESSION['name']= $row['name']; 
            $_SESSION['login']= $row['login'];
            $_SESSION['id']= $row['id_user'];
        }
        header('location:../index.php');
    }else{
        echo "<script> alert('Erro. Verifique suas informações'); </script>"; 
    }

}
?>