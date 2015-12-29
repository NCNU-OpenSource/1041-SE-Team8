<?php
require 'config.php';
?>
<html>
<head>
<script src="js/jquery.js" type="text/javascript"></script>
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
#mleftright{
	width:15%;
	height:100%;
	background-color:#17F995;
	float:left;
}
#mmiddle{
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
#mmmiddle{
	width:70%;
	height:70%;
	background-color:#9123A1;
	position:relative;
	margin:0 auto;
}

</style>

<script  type="text/javascript">
//function 名稱不能取close
function loadmsg(postID) {
	DIV='maindiv';
$.ajax({
		url: 'ingredient.php',
		dataType: 'html',
		type: 'POST',
		data: { id: postID},
		error: function(xhr) {
			$('#'+DIV).html(xhr);
			},
		success: function(response) {
			$('#'+DIV).html(response); //set the html content of the object msg
			}
	});
}
function loadfood(){
	document.getElementById('mmmiddle').style.display='';
	DIV='div000';
$.ajax({
	url: 'clickstat.php',
	datatype:'html',
	type:'POST',
	error:function(xhr){
		$('#'+DIV).html(xhr);
	},
	success: function(response) {
		$('#'+DIV).html(response); 
	}
	});
}
function closestat(obj,a){
	document.getElementById(a).style.display = "none";
}

</script>
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
		<div id="mleftright">
			<button>前一個烤箱</button>
		</div>

	    <div id="mmiddle">
			<button>烤箱1</button>
			<button>烤箱2</button>
			<div id="mmmiddle" style="display:none">
		<input type="button" onclick="closestat(this,'mmmiddle')" value="X">
				<div id="div000" style="display:"></div>
				<div id="maindiv" ></div>
			</div>
					
		</div>
		<div id="mleftright">
			<button>下一個烤箱</button>
		</div>
	</div>

	<div id="bottom">

		<input type="button" value="開始烤麵包囉" onclick="loadfood()" >


	
	</div>
	
</div>
</body>
</html>