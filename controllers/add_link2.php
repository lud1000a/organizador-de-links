<?php
require_once('../connection/conn.php');
session_start();

$id_user= $_SESSION['id'];
$arr1=[];
$arr2=[];

foreach($_POST['link'] as $link){
    array_push($arr1, $link);
}
foreach($_POST['label'] as $label){
    array_push($arr2, $label);
}

$arr= array_combine($arr2, $arr1);
//print_r($arr);
$x=0;
foreach($arr as $label => $link){
    $sql= "INSERT INTO links VALUES('', $id_user, '$label', '$link')";
    if($connect -> query($sql) === TRUE){
        $x=1;
    }else{
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
if($x===1){
    header('location:../ger_link.php');
}




?>
