<?php
require 'config.php';
?><html>
<head>
<?PHP
$id=$_SESSION['id'];
if($_POST!=null){
	$name=mysqli_real_escape_string($conn,$_POST['playername']);
	$sql="UPDATE user SET playername = '$name' WHERE `user`.`id` =$id;";
	mysqli_query($conn,$sql) or die("MySQL insert message error"); 
	$_SESSION['playername']=$_POST['playername'];
	header("Location:gamepage.php");
}
?>
</head>
<body>
<form method="post" action="playername.php">
請輸入遊戲名稱: <input type="text"  name="playername"/>
<input type="submit"/>
</form>
</body>
</html>