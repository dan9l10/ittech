<?php
session_start();
include 'connect.php';
$sql="SELECT name FROM player";
$res=$dbh->prepare($sql);
$res->execute();
$res=$res->fetchAll();
//print_r($res);
$array=array();
foreach ($res as $row){
    //$_SESSION['name']=$row['name'];
    //echo $row['name'];
    $array[]=$row['name'];
}
$_SESSION['name']=$array;
//print_r($_SESSION['name']);
        


