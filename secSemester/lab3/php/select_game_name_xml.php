<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="utf8" ?>';
header("Cache-Control: no-cache, must-revalidate"); 
include 'connect.php';
$name=$_POST['name'];
$res=$dbh->prepare("SELECT team1.name_team".'"as name_t"'.",team2.name_team , name , game.date , game.place,game.score from team as team1,team as team2, "
        . "game, player WHERE team1.id_team = player.id_player AND (game.fid_team = team1.id_team AND game.fid_team2 = team2.id_team) "
        . "AND player.name=:name UNION SELECT team1.name_team ,team2.name_team , name , game.date , game.place,game.score from team as team1,team as team2, game, "
        . "player WHERE team2.id_team = player.id_player AND (game.fid_team = team1.id_team AND game.fid_team2 = team2.id_team) AND player.name=:name");
$res->execute(array(':name'=>$name));
$res=$res->fetchAll(PDO::FETCH_NUM);
echo "<root>"; 
//print_r($res);
foreach ($res as $row){
    
    $place = $row[4];
    $date = $row[3];
    $score = $row[5];
    $name_player = $row[2];
    $team_name = $row[0];
    $opponent = $row[1];
    print ("<row>"
            . "<date>$date</date>"
            . "<place>$place</place>"
            . "<player>$name_player</player>"
            . "<team>$team_name</team>"
            . "<opponent>$opponent</opponent>"
            . "<score>$score</score>"
            . "</row>");
    
}
echo "</root>";

//exit();
//foreach ($res as $row){
//    $place[]=$row['place'];
//    $score[]=$row['score'];
//    $name_player[]=$row['name'];
//    $team_name[]=$row['as name_t'];
//    $opponent[]=$row['name_team'];
//    $date[]=$row['date'];
//}
//
//$_SESSION['data']=[
//        "place"=>$place,
//        "score"=>$score,
//        "name_player"=>$name_player,
//        "team_name"=>$team_name,
//        "opponent"=>$opponent,
//        "date"=>$date
//    ];
////print_r($_SESSION['data']);
////exit();
//header('location: /phpProject2');




