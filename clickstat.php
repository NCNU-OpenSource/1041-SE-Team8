<?php
	require 'config.php';
	$sql="select * from food ;";
	$result=mysqli_query($conn,$sql)or die('MySQL query error');
	while($row=mysqli_fetch_array($result)){
		echo "<input type='button' onclick=\"loadmsg('".$row['id']."')\" value='".$row['fname']."'  >";
			  // **onclick='loadmsg('1')'  ����]�A�n�令onclick=\"loadmsg('1')\" �~��]

	}

?>