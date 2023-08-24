<?php
require_once "../connection/conn.php";
require_once('../partials/list_errors.php');
session_start();
$_SESSION['id'] = null;
$_SESSION['name']=null;
$_SESSION['login'] = null;
$connect->close();
session_destroy();

header('location:log.php');
?>