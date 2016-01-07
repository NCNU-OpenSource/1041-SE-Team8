<?php
require 'config.php';
?>
<html>
<head>

<script src="js/jquery.js" type="text/javascript">

</script>

<?PHP

//把玩家資料用SESSION 記起來，升級功能
$sql = "SELECT * FROM user WHERE id='".$_SESSION['id']."'";
$result = mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)) {
	$_SESSION['id'] = $row['id'];
	$_SESSION['money']=$row['money'];
	$_SESSION['playername'] = $row['playername'];
	$_SESSION['exp']=$row['exp'];
	$_SESSION['foodpackage']=$row['foodpackage'];
	$_SESSION['oven']=$row['oven'];
	if($row['exp']>=$row['level']*10)
	{
		$level=$row['level']+1;
		$sql2="update user set level='$level', exp='0' where id='".$_SESSION['id']."';";
		mysqli_query($conn,$sql2) or die("MySQL query error"); ;

	}
	$_SESSION['level']=$row['level'];
	

}
$sql = "SELECT * FROM oven WHERE uid='".$_SESSION['id']."'";
$result=mysqli_query($conn,$sql);
while($rb=mysqli_fetch_array($result)){
	if($rb['ovenid']==1){
	$_SESSION['ovenid']=$rb['ovenid'];
	$_SESSION['starttime']=$rb['starttime'];
	$_SESSION['finishtime']=$rb['finishtime'];
	$_SESSION['fname']=$rb['fname'];
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
	margin:0 auto;
	
}
#buttontwo{
	width:15%;
	height:100%;
	float:left;
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
	overflow-y:hidden;
	overflow-x:auto;
	white-space:nowrap;
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
#middlediv,#mmmiddle{
	position:absolute;
	border:10px solid;
	border-radius:20px;
	bottom:15%;
	left:20%;
	width:60%;
	height:60%;
	background-color:#6123f1;
}
</style>

<script  type="text/javascript">
function recheck(){
　setTimeout('ShowTime()',10000);
}
//function 名稱不能取close
function loadmsg(postID) {
	DIV='div002';
$.ajax({
		url: 'ingredient.php',
		dataType: 'html',
		type: 'POST',
		data: { id: postID},
		error: function(xhr) {
			$('#'+DIV).html(xhr);
			},
		success: function(response) {
			$('#'+DIV).html(response);
			}
	});
}
function loadfood(){
	//$('#mmmiddle').show();
	$("#mmmiddle").fadeIn("slow");
	$("#div000").fadeIn("slow");
	$('#middlediv').hide();
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
	//document.getElementById(a).style.display = "none";
	 $("#"+a).fadeOut("slow");
	}
function shop(){
	//$('#middlediv').show();
	$("#middlediv").fadeIn("slow");
		$('#mmmiddle').hide();
	$('#div001').load('shop.php');
	
	
}
function kitchen(){
	$('#middlediv').show()  ;
	$('#mmmiddle').hide();
	$('#div001').load('kitchen.php');
	
	
}
function showoven(){
	DIV='mmiddle';
$.ajax({
	url: 'showoven.php',
	datatype:'html',
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
</script>

</head>
<body onload="">
<div id="container">
	<div id="top">
		<div id="account">
		
		<?php
			echo "<table border='3'><tr><td>名稱</td>";
			$sql = "SELECT * FROM user WHERE id='".$_SESSION['id']."'";
			$result = mysqli_query($conn,$sql) or die('MySQL query error');
			while($row=mysqli_fetch_array($result)){
				echo "<td>".$row['playername']."</td></tr>";
				echo "<tr><td>等級</td><td>".$row['level']."</td><td>金錢</td><td>".$row['money']."</td><td>烤爐數</td><td>".$row['oven']."</td></tr>";
				echo "<tr><td>經驗值</td><td>".$row['exp']."</td><td>材料包</td><td>".$row['foodpackage']."</td></tr>";
			}
			echo "</table>";
			?>
		</div>
		<div id="buttonone">
				<img src="bag_1.png" onclick="kitchen()" style="height:100%">
			</div>
			<div id="buttontwo">
				<img src="shop_1.png" onclick="shop()" style="height:100%">
		</div>
	</div>
	
	
	<div id="middle">

		<div id="mleftright">
			<button>前一個烤箱</button>
			<div ><span id="time"> </span></div>
		</div>

	    <div id="mmiddle">
			<script>showoven();</script>
		</div>
		<div id="mleftright">
			<button>下一個烤箱</button>
		</div>
				<div id="mmmiddle" style="display:none">
				<input type="button" onclick="closestat(this,'mmmiddle')" value="X"style="position:relative; left:95%">
				<div id="div000" style="display:"></div>
				<div id="div002" ></div>
			</div>
	</div>

	<div id="bottom">

		<input type="button" value="開始烤麵包囉" onclick="loadfood()" >
	</div>
	<div id="middlediv" style="display:none" >
	<input type="button"  onclick="closestat(this,'middlediv')" value="X"style="position:relative; left:95%">
	<div id="div000" style="display:"></div>
	<div id="div001" style="margin:0 auto;"></div>
	</div>
	
</div>
</body>
</html>