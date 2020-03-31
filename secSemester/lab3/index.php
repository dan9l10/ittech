<!DOCTYPE html>
<?php
include 'php/connect.php';
require_once 'php/select_name.php';

//require_once 'php/select_league.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style/table.css" >
        <script src="js/main.js"></script>
    </head>
    <body>
         <!--form0-->
         <h2>Select league</h2>
<!--        <form  method="POST" action="php/league.php">-->
            <select name="league" onchange="text()" id="league">
            <?php foreach($_SESSION['leagues'] as $row):?>
                <option value="<?=$row[0]?>"><?=$row[0]?></option>
            <?php endforeach; ?>
            </select>
            
<!--        </form>-->
        
        <!--form1-->
        <h2>Select date</h2>
        <form id="date" action="php/select_game_date.php" method="POST">
            <!--<input type="text" name="test" >-->
            <input type="date" name="date" min="2020-03-28" value="<?php echo date("Y-m-d")?>">
            <input type="submit" value="OK">
            <input type="checkbox" onchange="show_data()" >show betwwen
            <div id="between"></div>
        </form>
        <!--form2-->
         <h2>Select name</h2>
         <form  method="POST" action="php/select_game_name.php">
            <select name="name">
            <?php foreach($_SESSION['name'] as $row):?>
                <option value="<?=$row?>"><?=$row?></option>
            <?php endforeach; ?>
            </select>
            <input type="submit" value="OK">
        </form>
         <?php  if(isset($_SESSION['data'])):?>
         <table border="1" class="table_blur">
        <thead>
            <tr>
                <th>DATE</th>
                <th>PLACE</th>
                <th>PLAYER</th>
                <th>TEAM 1</th>
                <th>SCORE</th>
                <th>TEAM 2</th>
            </tr>
        </thead>
        <tbody id="res" >           
       <?php for($i=0;$i<count($_SESSION['data']['score']);$i++):?>
            <tr><td><?=$_SESSION['data']['date'][$i]?></td><td><?=$_SESSION['data']['place'][$i]?></td><td><?=$_SESSION['data']['name_player'][$i]?></td><td><?=$_SESSION['data']['team_name'][$i]?></td><td><?=$_SESSION['data']['score'][$i]?></td><td><?=$_SESSION['data']['opponent'][$i]?></td></tr>
            <?php
            endfor;
        endif;
            unset($_SESSION['data']);
        ?>
        </tbody>
        </table>
         
         
         <!--table 2-->
        
         <table border="1" class="table_blur" >
        <thead>
            <tr>
                <th>COACH</th>
                <th>TEAM</th>
                <th>LEAGUE</th>
            </tr>
        </thead>
        <tbody id="league_table" > 
            
        </tbody>
        </table>
    </body>
</html>
