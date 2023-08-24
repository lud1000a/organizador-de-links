<?php
require_once('connection/conn.php');
session_start();

$id = isset($_GET['link']) ? $_GET['link'] : false;

if(!$id) {
    header('location: ../index.php?code=not_found');
}

$sql="DELETE FROM links WHERE id_user=$id";
    if($connect->query($sql)){
        $sqli= "DELETE FROM user WHERE id_user=$id";

        if($connect->query($sqli)){
           echo "<script> alert('Usuário deletado!'); 
                window.location.href='open/logout.php';
                </script>";
        }else{
            echo "Error: " . $sqli . "<br>" . $connect->error;
            //header('location: ger_conta.php?code=not_found');
        }
    }else{
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
?>