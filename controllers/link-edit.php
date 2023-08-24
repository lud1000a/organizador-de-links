<?php
require_once('../connection/conn.php');
 
session_start();
/*
    $id = isset($_GET['link']) ? $_GET['link'] : false;

    if(!$id) {
        header('location: ../index.php?code=not_found');
    }
*/
if($_POST){
    if($_SESSION['t']===1){
    $name=$_POST['name'];
    $login=$_POST['login'];
    $pw=$_POST['pw'];
    $id=$_POST['id'];
    if($pw!=null){
        $sql= $connect->query("UPDATE user SET name='$name', login='$login', password='$pw' WHERE id_user=$id");
        if($sql===TRUE){
            header('location: ../ger_conta.php?code=edited');
        }else{
            header('location: ../ger_conta.php?code=edit_erro');
        }
    }else{
        header('location: ../ger_conta.php?code=password_erro');
    }
    }else{
    $label=$_POST['label'];
    $link=$_POST['link'];
    $id=$_POST['id'];
    $sql= $connect->query("UPDATE links SET link='$link', label='$label' WHERE id_link=$id");
    if($sql===TRUE){
        header('location: ../ger_link.php?code=edited');
    }else{
        header('location: ../ger_link.php?code=edit_erro');
    }
}
}

?>