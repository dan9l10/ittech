<?php
session_start();
include 'connect.php';
$date=$_POST['date'];
$res=$dbh->prepare("SELECT game.date,game.score,team1.name_team,team2.name_team as team322, game.place,team1.coach,team1.league FROM game,team as team1,team as team2 WHERE (game.fid_team = team1.id_team AND game.fid_team2 = team2.id_team) AND game.date=:date");
$res->execute(array("date"=>$date));
$res=$res->fetchAll();
print_r($res);

$place = array();
$date = array();
$score = array();
$name_player = array();
$league = array();
$coach = array();
$team_name = array();
$opponent = array();
foreach ($res as $row){
    $place[]=$row['place'];
    $score[]=$row['score'];
    $name_player[]=$row['league'];
    $team_name[]=$row['name_team'];
    $opponent[]=$row['team322'];
    $date[]=$row['date'];
}

$_SESSION['data']=[
        "place"=>$place,
        "score"=>$score,
        "name_player"=>$name_player,
        "team_name"=>$team_name,
        "opponent"=>$opponent,
        "date"=>$date
    ];
//print_r($_SESSION['data']);
header('location: /lab1/ittech/secSemester/lab1/');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

