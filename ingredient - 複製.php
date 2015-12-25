<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
require 'config.php';
$id =$_GET['id'];
$sql="select * from food where id=1";//<----讀取食譜詳細材料
$result= mysqli_query($conn,$sql);
$text="";
while($row=mysqli_fetch_array($result)){
	$text=$row['description'];
}
echo "蘋果派材料有";

$textarray=explode(" ",$text);

echo "<br/>";

for ($i=0;$i<count($textarray);$i++){
	echo "<ul >";
	echo "<li>$textarray[$i] ";
	$i+=1;
	echo "$textarray[$i]</li>";
	echo "</ul>";
}
?></body></html>