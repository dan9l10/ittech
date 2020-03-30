<?php
$db_driver="mysql";
$host = "localhost";
$database = "football";
$dsn = "$db_driver:host=$host; dbname=$database";
$username = "root";
$password = "";
try{
    $dbh = new PDO ($dsn, $username, $password);
  
}
catch (PDOException $e){
    echo "<br>Error!".$e->getMessage();
}

?>


