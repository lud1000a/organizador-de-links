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
    <h1><i class='bx bxs-user' ></i> <?php echo $_SESSION['name']; ?></h1>
    <div class="media-body">
    <button><a href="index.php">Voltar</a></button>
    <button><a href="open/logout.php">Sair</a></button>
    </div>
    </div>
    </header>
<body>
    <center>
    <h1>Dados</h1>
    <?php
    $id = $_SESSION['id'];
    $_SESSION['t']=1;
    $sql = $connect->query("SELECT * FROM user WHERE id_user=$id");
    if ($sql->num_rows > 0) {
        echo "<table class='table'>
            <th scope='col'> Nome </th> 
            <th scope='col'> Login </th>
            <th scope='col'> Action </th>";
        while ($row = $sql->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['login']; ?></td>
                <td>
                    <a href="edit.php?link=<?= $row['id_user']; ?>">Alterar</a><br>
                    <a href="del.php?link=<?= $row['id_user']; ?>">Excluir</a>
                </td>
            </tr>
        <?php }
        echo "</table>";
    }
    ?>
    </center>
</body>
</html>