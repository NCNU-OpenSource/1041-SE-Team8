<html>
<head >
<link rel="stylesheet"  href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="javascript" href="jquery-1.11.3.min.js">
<style>
td{
	border-bottom:0px solid black;
	border-left:0px;
	border-right:0px;
}
</style>
<script>
function saleclick(num){
	if(num==10){
	document.getElementById("count").hidden=false;
	document.getElementById("submit10").hidden=false;
	}
	if(num==11){
	document.getElementById("oven").hidden=false;
	}
}

</script>
</head>
<body >
<?PHP
require 'config.php';
$sql="select *from shop ";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
	if($row['id']=='1'){
		$_SESSION['foodprice']=$row['price'];
		
	}
	if($row['id']=='2'){
		$_SESSION['ovenprice']=$row['price'];
		
	}
	
	
}
?>
<script >

function checkmoney(){
	var a=document.getElementById("count").value;
	var b= a*<?PHP echo $_SESSION['foodprice']?>;
	if(<?PHP echo $_SESSION['money']; ?> >= b){
		document.getElementById("submit10").disabled=false;
		document.getElementById("submit10").value="購買";
	}
	else{
		document.getElementById("submit10").disabled=true;
		document.getElementById("submit10").value="金錢不足";
	}

	
	
}
function open(){
	var level=<?PHP echo $_SESSION['level'];?>;
	var money=<?PHP echo $_SESSION['money'];?>;
	var oven=<?PHP echo $_SESSION['oven'];?>;
	if((level >= 7 )&& (money>=500 )&& (oven ==2)){
		document.getElementById("oven").disabled=false;
		document.getElementById("oven").value="擴充";
	}
	else if((level >= 14 )&& (money>=1000 )&& (oven ==3)){
		document.getElementById("oven").disabled=false;
		document.getElementById("oven").value="擴充";
	}
	else if((level >= 21 )&& (money>=1000 )&& (oven ==4)){
		document.getElementById("oven").disabled=false;
		document.getElementById("oven").value="擴充";
	}
	else if((level >= 28 )&& (money>=1000 )&& (oven ==4)){
		document.getElementById("oven").disabled=false;
		document.getElementById("oven").value="擴充";
	}
	
	else{
		document.getElementById("oven").disabled=true;
		document.getElementById("oven").value="不能擴充";
	}

}

</script>
<script>open();</script>
<div id="tablecss">
<FORM action="shopsend.php" method="POST">

<table style="width:70%;height:45%; margin:0 auto; text-align: center;" border="2" CLASS="table">
<tr class='danger'><td  width="60%"><img  width="30%" height="30%"src='icon/foodpackage.png'></td>
<td ><span class='label label-pill label-warning' style="position:relative;top:90%;">$</span><span><?PHP echo $_SESSION['foodprice'];?></span></td>
<td height="15%">
<h2><a class='label label-pill label-success' id='sale'  onclick='saleclick(10)'>BUY</a></h2>
<?PHP
echo "<select class='count' name='count' id='count' onchange='checkmoney();'  hidden>";
for($i=0;$i<=20;$i++){
	echo "<option value=".$i.">".$i."</option>";
}
echo "</select>";?>
<input type="submit" value="購買" id="submit10" hidden><input type="text"name="id" value="<?php echo $_SESSION['id'];?>"hidden ></td></tr>
</table>
</form>
<FORM action="addoven.php" method="POST">
<table style="width:70%;height:45%; margin:0 auto; text-align: center;" border="2"  CLASS="table">
<tr class='success'><td><img  width="35%" height="5%"src='icon/oven.png'><span class='label label-pill label-warning' style="position:relative;left:20%;">$</span><span style="position:relative;left:20%;"><?PHP echo $_SESSION['ovenprice'];?></span>


</td>
<td colspan="2" rowspan="1" height="15%" ><span class='label label-pill label-danger' style="position:relative;left:3%;">*等級7的倍數能增加1次擴充</span>
<h2><a class='label label-pill label-success' id='sale'  onclick='saleclick(11)'>BUY</a></h2>
<br/>
<input type="submit"  id="oven" value="" disabled="disabled" hidden></td></tr>
</table>
</FORM>
</div>
</body>


</html>