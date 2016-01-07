<style>
#bread_detail{
	position:absolute;
	left:50%;
	top:5%;
	
}
form img{
	margin:2px;
	
}
</style>

<?php
require 'config.php';
$id =$_REQUEST['id'];
$sql="select * from food where id=$id";//<----讀取食譜詳細材料
$result= mysqli_query($conn,$sql);
$text="";
while($row=mysqli_fetch_array($result)){
	$id=$row['id'];
	$funit=$row['foodpackage'];
	$ftime=$row['time'];
	$fname=$row['fname'];
	$exp=$row['exp'];
	$money=$row['money'];
}
$breadid=$id-1;
echo "<img src=icon/bread/bread$breadid.png style='width:150px;height:150px; position:relative; top:8%;left:2%;'> ";
echo "<span style='flaot:left;position:absolute;top:80%;left:7%;background-color:#4d4dff; color:white;padding:8px; border:2px inset;border-color:white;border-radius:5px;'>$fname</span>";
echo "<form action='stated.php' method='POST' id='bread_detail' >";
echo "<input type='text'  name='id' value='".$id."' hidden/>";
echo "<input type='text'  name='ftime' value='".$ftime."' hidden/>";
echo "<input type='text'  name='fname' value='".$fname."' hidden/>";
echo "<input type='text'  name='funit' value='".$funit."' hidden/>";
echo "<img src='icon/exp.png' style='width:30px;height:30px;'>";
echo "<strong> : ".$exp."</strong>";
echo "<br/>";
echo "<img src='icon/clock.png' style='width:30px;height:30px;'>";
echo "<strong> : ".$ftime."</strong>秒";
echo "<br/>";
echo "<img src='icon/foodpackage.png' style='width:30px;height:30px;'>";
echo " <strong> : ".$funit."<strong> 個";
echo "<br/>";
echo "<img src='icon/money.png' style='width:30px;height:30px;'>";
echo "<strong> : ".$money."</strong>";
echo "<br/>";
echo "<br/>";
echo "<select class='btn btn-success' name='count' id='count' onchange='checkfood()'>";
for($i=0;$i<=20;$i++){
	echo "<option value=".$i.">".$i."</option>";
	
}
echo "</select>";

echo "<input type='submit' id='submit' value='請選擇數量' class='btn btn-success' disabled/>";
echo "</form>";

?>
<script>

function checkfood(){
	var foodpackage = <?PHP echo $_SESSION['foodpackage'];?>;
	var foodunit=<?PHP echo $funit;?>;
	var count=document.getElementById("count").value;
	var sum=count *foodunit;
	if(foodpackage<sum){
		document.getElementById("submit").disabled=true;
		document.getElementById("submit").value="材枓包不足夠";
		
	}else{
		document.getElementById("submit").disabled=false;
		document.getElementById("submit").value="開始烤囉";
	}
	
}

</script>