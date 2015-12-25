<?php
require 'config.php';
?>
<html>
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
<style type="text/css">
#container{
	margin:20px auto;
	
}
#top{
	width:100%;
	height:15%;
	background-color:#845682;
	margin:0 auto;
}
#account{
	width:70%;
	height:100%;
	float:left;
	background-color:#82FF82;
	margin:0 auto;
	
}
#buttonone{
	width:15%;
	height:100%;
	float:left;
	background-color:#22FF82;
	margin:0 auto;
	
}
#buttontwo{
	width:15%;
	height:100%;
	float:left;
	background-color:#22FF25;
	margin:0 auto;
	
}
#middle{
	width:100%;
	height:70%;
	background-color:#97F615;
	
}
#m-left-right{
	width:15%;
	height:100%;
	background-color:#17F995;
	float:left;
}
#m-middle{
	width:70%;
	height:100%;
	background-color:#97F911;
	float:left;
	
}
#bottom{
	width:100%;
	height:10%;
	background-color:#97F6A1;

	
}

</style>
</head>
<body>
<div id="container">
	<div id="top">
	<div id="account">
		角色資訊
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
	<div id="buttonone">
		<button>廚房</button>
	</div>
	<div id="buttontwo">
		<button>商店</button>
	</div>
	</div>
	
	
	<div id="middle">
		<div id="m-left-right">
			<button>前一個烤箱</button>
		</div>
	    <div id="m-middle">
			<button>烤箱1</button>
			<button>烤箱2</button>
		</div>
		<div id="m-left-right">
			<button>下一個烤箱</button>
		</div>
	</div>
	
	
	<div id="bottom">
	
		<button>制作麵包囉</button><a href="ingredient.php?id=1">蘋果派</a> <a href="ingredient.php?id=2">布丁</a>
	</div>
	
</div>
</body>
</html>