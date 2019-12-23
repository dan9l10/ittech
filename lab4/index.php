<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php 
	echo 'Hello World'; 
?>
<br>
<?php
echo 2+2;
?>
<br>
<p>My work</p>
<?php
$array1=array(1,2,3,4,5,6,7);
$array2=array(1,2,4,8,10,18,20);
$array3=array(8,4,1,0,88,6,6,6,6,6);
$result1 = count($array1);
$result2 = count($array3);
$res1 = count(array_unique($array1));
$res2 = count(array_unique($array3));
$res3 = $result1 - $res1;
$res4 = $result2 - $res2;
echo"1:";
print_r(array_unique($array1));
echo "<br>2 : ";
print_r(array_unique($array2));
echo "<br>3 : ";
print_r(array_unique($array3));
echo "<br>1st array has $res3;<br> ";
echo "2 array has $res4 <br>";
$array4=array_unique(array_merge($array2,$array3));
echo "New array : ";
print_r($array4 );
echo "<br>";
$i=count($array2);
foreach(array_reverse($array2) as $value){
	echo "$value " ;
}
?>

</body>
</html>