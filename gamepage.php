<?php
require 'config.php';
?><html>
<head>
<?PHP
$id=$_SESSION['id'];
$sql="select * from user where id=$id ;";
$result = mysqli_query($conn,$sql) or die('MySQL query error');

while($row = mysqli_fetch_array($result)){      //<--升級功能
	if($row['exp']>=$row['level']*10)
	{
		$id=$_SESSION['id'];
		$level=$row['level']+1;
		$sql2="update user set level='$level', exp='0' where id='$id';";
		mysqli_query($conn,$sql2) or die("MySQL query error"); ;
		
		
	}
	
}
?>
</head>
<body>
<div>
<?php
echo "<table border='3'><tr><td>名稱</td>";
$result = mysqli_query($conn,$sql) or die('MySQL query error');
while($row=mysqli_fetch_array($result)){
	echo "<td>".$row['playername']."</td></tr>";
	echo "<tr><td>等級</td><td>".$row['level']."</td></tr>";
	echo "<tr><td>經驗值</td><td>".$row['exp']."</td></tr>";
}

echo "</table>";




?>
</div>
可製作食物:<a href="ingredient.php?id=1">蘋果派</a> <a href="ingredient.php?id=2">布丁</a>
</body>
</html>