<?php
    require_once('../connection/conn.php');
    session_start();

    $id = isset($_GET['link']) ? $_GET['link'] : false;

    if(!$id) {
        header('location: ../index.php?code=not_found');
    }

    $sql="DELETE FROM links WHERE id_link=$id";


    if($connect->query($sql)){
        header('location: ../ger_link.php?code=droped');
    }else{
        header('location: ../ger_link.php?code=not_found');
    }