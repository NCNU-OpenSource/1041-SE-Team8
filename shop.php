<html>
<head >
<script>
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
		document.getElementById("submit").disabled=false;
		document.getElementById("submit").value="購買";
	}
	else{
		document.getElementById("submit").disabled=true;
		document.getElementById("submit").value="金錢不足";
	}

	
	
}
function open(){
	var level=<?PHP echo $_SESSION['level'];?>;
	var money=<?PHP echo $_SESSION['money'];?>;
	var oven=<?PHP echo $_SESSION['oven'];?>;
	if((level >= 7 )&& (money>=1000 )&& (oven ==2)){
		document.getElementById("oven").disabled=false;
		document.getElementById("oven").value="擴充";
	}
	else if((level >= 14 )&& (money>=1000 )&& (oven ==3)){
		document.getElementById("oven").disabled=false;
		document.getElementById("oven").value="擴充";
	}
	
	else{
		document.getElementById("oven").disabled=true;
		document.getElementById("oven").value="不能擴充";
	}

}

</script>
<FORM action="shopsend.php" method="POST">
<script>open();</script>
<table style="width:60%;height:45%; margin:0 auto; text-align: center;" border="2" >
<tr><td  width="50%" height="100%" id="test">材料包$:<?PHP echo $_SESSION['foodprice'];?></td>
<td height="15%"><?PHP
echo "數量<select class='count' name='count' id='count' onchange='checkmoney();' >";
for($i=0;$i<=20;$i++){
	echo "<option value=".$i.">".$i."</option>";
}
echo "</select>";?>
</td><td colspan="2"height="15%"><input type="submit" value="購買" id="submit"><input type="text"name="id" value="<?php echo $_SESSION['id'];?>"hidden ></td></tr>
</table>
</form>
<FORM action="addoven.php" method="POST" >
<table style="width:60%;height:45%; margin:0 auto; text-align: center;" border="2" >
<tr><td  height="100%"width="50%"  >烤爐$:<?PHP echo $_SESSION['ovenprice'];?></td>
<td colspan="2" rowspan="2" height="15%" ><input type="submit"  id="oven" value="" disabled="disabled" ></td></tr>
</table>
</FORM>

</body>


</html>