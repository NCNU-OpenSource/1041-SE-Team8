<?php
	require 'config.php';
	$count=0;
	$sql="select * from food ;";
	$result=mysqli_query($conn,$sql)or die('MySQL query error');
	while($row=mysqli_fetch_array($result)){
		///echo "<input type='button' onclick=\"loadmsg('".$row['id']."')\" value='".$row['fname']."'  >";
			  // **onclick='loadmsg('1')'  不能跑，要改成onclick=\"loadmsg('1')\" 才能跑
		echo "<img src='icon/bread/bread$count.png' onclick=\"loadmsg('".$row['id']."')\" style='	margin:0% 3% 3% 0%;'>";
	
	$count++;
	}
?>
