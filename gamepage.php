
<?php
require 'config.php';
?>
<html>
<head>
<link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="javascript" href="jquery-1.11.3.min.js">
<script src="js/jquery.js" type="text/javascript">
//var fbhtml_url=window.location.toString();
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
	if($row['exp']>=$row['level']*$row['level']*10)
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
body{
	background-size:cover;
	background-repeat:no-repeat;
}
#container{
	margin:20px auto;
	padding: 6px;
	width:90%;
	height:85%;
	border-radius:40px;
	background-image: url("icon/kitchen_background11.jpg");
	background-size:cover;
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
	position:relative;
	top:20%;
	left:3%;
	margin:0 auto;
/*	transform: rotate(1deg); 
	transform: skewZ(20deg);
*/

	
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
	
}
#mleftright{
	width:15%;
	height:100%;
	float:left;
	position:relative;
	top:5%;
}
#mmiddle{
	width:70%;
	height:90%;
	position:relative;
	top:10%;
	float:left;
	overflow-y:hidden;
	overflow-x:auto;
	white-space:nowrap;
	border-bottom:5px;
	border-top:0px;
	border-style:solid;
	background-color:#f2f2f2;
	opacity:0.95;
	padding:0px;

}

#bottom{
	width:100%;
	height:10%;

	
}
#mmmiddle{
	background-image: url("icon/background1.jpg");
}

#middlediv,#mmmiddle{
	position:absolute;
	border:10px solid;
	border-radius:20px;
	bottom:15%;
	left:20%;
	width:60%;
	height:60%;
	background-image: url("icon/background1.jpg");
}
#div000{
	position:relative;
	left:5%;
	width:85%;
	float:left;
	overflow-y:hidden;
	overflow-x:auto;
	white-space:nowrap;
}
#div001{
	position:relative;
	top:10%;
	left:5%;
	width:85%;
	float:left;
	height:85%;
	overflow-x:hidden;
	overflow-y:auto;
	white-space:nowrap;
}
#div002{
	position:absolute;
	width:90%;
	height:60%;
	border-top:5px; 
	border-left:10%; 
	border-right:15px; 
	border-bottom:15px; 
	top:30%;
	left:5%;
	border-style:solid;
	border-radius:20px;
		background-color: #e6b900;
}
#actable td{
	width:50px;
	
	
}
#actable{
	background-color:white;
	padding:0;
	background-image: url("icon/background1.jpg");
	border-radius:30px;
	color:white;
	
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
	$("#middlediv").fadeIn("slow");
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
<body  background="icon/body1.jpg" >
<div id="container">
	<div id="top">
		<div id="account">
		
		<?php
		$up=$_SESSION['exp'];
		$down=$_SESSION['level']*$_SESSION['level']*10;
		
		$tdvalue= number_format(($up/$down),4)*100;
			echo "<table  height='90%' id='actable'>";
			echo "<tr>";
			echo "<td rowspan='3' style='text-align:center;'><strong>".$_SESSION['level']."</strong><br/><span class='btn btn-warning btn-md' style=' border-radius: 3em;'>Level</span></td>";
			echo "<td rowspan='2' colspan='2' style='text-align:center'><strong>".$_SESSION['playername']."</strong></td><td></td><td></td><td></td><td></td></tr>";
			echo "<tr>";
			echo "<td><img src='icon/foodpackage.png' width='50%' height='10%'></td><td>".$_SESSION['foodpackage']."</td>";
			echo "<td><img src='icon/oven.png' width='50%' height='1.5%'></td><td>".$_SESSION['oven']."</td>";
			echo "</tr>";
			echo "<tr >";
			echo "<td ><span class='btn btn-info btn-xs' style='position:relative;left:7%'>Exp</span></td>";
			//經驗橫TD  改width 值和後面值就可,只吃%值(10%)
			echo "<td style='width:30%'><div class='progress'><div class='progress-bar progress-bar-striped active' role='progressbar'aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' 
			style='width:".$tdvalue."%'>".$tdvalue."%</div></div></td>";
			echo "<td><img src='icon/money.png' width='50%' height='10%'></td><td>".$_SESSION['money']."</td>";
			echo "<td></td><td></td>";
			echo "</tr>";
			echo "</table>";
			?>
		</div>
		<div id="buttonone">
				<img src="icon/bag_1.png" onclick="kitchen()" style="height:100%">
			</div>
			<div id="buttontwo">
				<img src="icon/shop_1.png" onclick="shop()" style="height:100%">
		</div>
	</div>
	
	<script>
		var fbhtml_url=window.location.toString();
	</script>
	<div id="middle">
		<div id="mleftright">
			<div ><span id="time"> </span></div>
		</div>

	    <div id="mmiddle">
			<script>showoven();</script>
		</div>
		<div id="mleftright">
	<img src="icon/dog.jpg" width="70%" style="position:relative; top :50%;" >
		</div>
				<div id="mmmiddle" style="display:none">
				<input type="button" onclick="closestat(this,'mmmiddle')" value="X" class="btn btn-danger" style="position:relative; left:10%;">
				<div id="div000" style="display:"></div>
				<div id="div002" ></div>
			</div>
	</div>

	<div id="bottom">
		<input type="button" value="開始烤麵包" onclick="loadfood()" class="btn btn-large btn-block btn-danger" style="font-size:36px; border-radius:180px 180px 20px 20px;">
	</div>
	<div id="middlediv" style="display:none" >
	<input type="button"  onclick="closestat(this,'middlediv')" value="X" class="btn btn-danger" style="position:relative; left:7%">
	<div id="div000" style="display:"></div>
	<div id="div001" style="margin:0 auto;"></div>
	</div>

</div>
	<div id="logout" style="position:relative;left:60%;width:30%;">
	<a href="javascript:void(0);" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u=www.yahoo.com.tw');return false;">
			<img src="icon/Facebook.png" style="height:6% ;">
			</a>
			<a href="javascript:void(0);" 
			onclick="window.open('https://www.instagram.com/');return false;">
			<img src="icon/ig.png" style="height:6%">
			</a>
			<a href="javascript:void(0);" 
			onclick="window.open('https://twitter.com/home/?status=yahoo.com.tw');return false;">
			<img src="icon/twitter.png" style="height:6%">
			</a>
			<a href="javascript:void(0);" 
			onclick="window.open('https://github.com/');return false;">
			<img src="icon/github.png" style="height:6%">
			</a>
			<a href="javascript:void(0);" 
			onclick="window.open('https://plus.google.com/share?url=www.yahoo.com.tw');return false;">
			<img src="icon/google.png" style="height:6%">
			</a>
			<a type="button" class="btn btn-danger" href="logout.php">登出</a>
			</div>
</body>
</html>