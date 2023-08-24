<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="../style.css">
<div class="tudo">
<center><h3>Seus Links</h3></center>
<?php
$id = $_SESSION['id'];
$x=0;
$sql = $connect->query("SELECT * FROM links WHERE id_user=$id");
if ($sql -> num_rows > 0) {
        while ($row = $sql->fetch_assoc()) { $x++;?>
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
        <?php }
    } else {
        echo "Você ainda não possui nenhum link";
    }
?>
</div>