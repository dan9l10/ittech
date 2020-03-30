<?php
include 'connect.php';

$request=$dbh->prepare("select league from team");
$request->execute();
$request=$request->fetchAll();
//print_r($request);

$leagues=array();

foreach ($request as $row){
    $leagues[]=$row;
}
//print_r($leagues);
$_SESSION['leagues']=$leagues;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

