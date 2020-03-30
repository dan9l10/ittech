<?php
include 'connect.php';
$league=$_POST['league'];
session_start();
$request=$dbh->prepare("select name_team,coach,league from team where league=:league");
$request->execute(array(":league"=>$league));
$request=$request->fetchAll();
//print_r($request);

$league = array();
$coach = array();
$team_name = array();
foreach ($request as $row){
   
    $league[]=$row['league'];
    $team_name[]=$row['name_team'];
    $coach[]=$row['coach'];
}
$_SESSION['data_league']=[
 
        "team_name"=>$team_name,
        "coach"=>$coach,
        "league"=>$league
    ];

    print_r($_SESSION['data_league']);
 header('Location: ../index.php');
/* 
 * 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

