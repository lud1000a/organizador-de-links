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
    <h1>Cadastro</h1>
    <span>Já tem uma conta? <a href="log.php">Entrar</a>
    </center>
    <form action="cad.php" method="post">
    <div class="form-group">
        <label for="formGroupExampleInput">Nome</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="" required></br>
    </div>
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
    $name= $_POST['name'];
    $login= $_POST['login'];
    $pass= $_POST['password'];
    $password= crypt($pass, 'rl');
    
    $result= $connect -> query("SELECT * FROM user WHERE login='$login'");    
        if( $result -> num_rows > 0){
            echo "<script> alert('Usuário já existente'); </script>";
            die;
        }
        else{
            $sql= "INSERT INTO user VALUES ('', '$name', '$login', '$password')";
            if($connect -> query($sql) === TRUE){
                $_SESSION['name']= $name; 
                $_SESSION['login']= $login;
                $r= $connect -> query("SELECT * FROM user WHERE login='$login'");    
                if( $r -> num_rows > 0){
                    while($row=$r->fetch_assoc()){
                        $_SESSION['id']=$row['id_user'];
                    }
                }
                echo "<script> alert('Usuário cadastrado com sucesso!'); 
                window.location.href='../index.php';
                </script>";
            }else{
                echo "Error: " . $sql . "<br>" . $connect->error;
            }
    
        }
}

?>