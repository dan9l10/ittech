<?php
include 'connect.php';
$date=$_POST['date'];
$request=$dbh->prepare("SELECT game.date,game.score,team1.name_team,team2.name_team as team322, game.place,team1.coach,team1.league FROM game,team as team1,team as team2 WHERE (game.fid_team = team1.id_team AND game.fid_team2 = team2.id_team) AND game.date=:date");
$request->execute(array("date"=>$date));
$result=$request->fetchAll(PDO::FETCH_OBJ);
echo json_encode($result);

