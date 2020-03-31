<?php
session_start();
include 'connect.php';
$league=$_REQUEST['league'];
//echo $league;
//exit();
$request=$dbh->prepare("select name_team,coach,league from team where league=:league");
$request->execute(array(":league"=>$league));
$request=$request->fetchAll();
//print_r($request);

$league = array();
$coach = array();
$team_name = array();
foreach ($request as $row){
   $name_team=$row['name_team'];
   $coach=$row['coach'];
   $league=$row['league'];
   print "<tr><td>$coach</td><td>$name_team</td><td>$league</td></tr>";
}
//$_SESSION['data_league']=[
// 
//        "team_name"=>$team_name,
//        "coach"=>$coach,
//        "league"=>$league
//    ];
//
//    //print_r($_SESSION['data_league']);
// header('Location: ../index.php');
/* 
 * 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

