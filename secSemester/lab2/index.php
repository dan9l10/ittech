<!DOCTYPE html>
<?php
include 'php/connect.php';
require_once 'php/select_name.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style/table.css" >
        <script src="js/main.js"></script>
    </head>
    <body>
         <h2>Select league</h2>
            <select name="league" onchange="text()" id="league">
            <?php foreach($_SESSION['leagues'] as $row):?>
                <option value="<?=$row[0]?>"><?=$row[0]?></option>
            <?php endforeach; ?>
            </select>
        <h2>Select date</h2>
        <input id="date" onchange="xhr()" type="date" name="date" min="2020-03-28" value="<?php echo date("Y-m-d")?>">  
         <h2>Select name</h2>
         <form  method="POST" action="php/select_game_name.php">
            <select name="name">
            <?php foreach($_SESSION['name'] as $row):?>
                <option value="<?=$row?>"><?=$row?></option>
            <?php endforeach; ?>
            </select>
            <input type="submit" value="OK">
        </form>
         <table border="1" class="table_blur">
        <thead>
            <tr>
                <th>DATE</th>
                <th>PLACE</th>
                <th>LEAGUE</th>
                <th>TEAM 1</th>
                <th>TEAM 2</th>
                <th>SCORE</th>
            </tr>
        </thead>
        <tbody id="res" >           
        </tbody>
        </table>
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
