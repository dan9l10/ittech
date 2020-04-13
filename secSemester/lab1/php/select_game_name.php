<?php
session_start();
include 'connect.php';

$name=$_POST['name'];


$res=$dbh->prepare("SELECT team1.name_team".'"as name_t"'.",team2.name_team , name , game.date , game.place,game.score from team as team1,team as team2, "
        . "game, player WHERE team1.id_team = player.id_player AND (game.fid_team = team1.id_team AND game.fid_team2 = team2.id_team) "
        . "AND player.name=:name UNION SELECT team1.name_team ,team2.name_team , name , game.date , game.place,game.score from team as team1,team as team2, game, "
        . "player WHERE team2.id_team = player.id_player AND (game.fid_team = team1.id_team AND game.fid_team2 = team2.id_team) AND player.name=:name");
$res->execute(array(':name'=>$name));
$res=$res->fetchAll();
//print_r($res);
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
    $name_player[]=$row['name'];
    $team_name[]=$row['as name_t'];
    $opponent[]=$row['name_team'];
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
//exit();
header('location: ../index.php');




