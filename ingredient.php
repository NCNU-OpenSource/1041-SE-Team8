
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
}
echo "<form action='stated.php' method='POST' >";
echo "<input type='text'  name='id' value='".$id."' hidden/>";
echo "<input type='text'  name='ftime' value='".$ftime."' hidden/>";
echo "<input type='text'  name='fname' value='".$fname."' hidden/>";
echo "<input type='text'  name='funit' value='".$funit."' hidden/>";
echo "數量<select class='count' name='count' id='count' onchange='checkfood()' >";

for($i=0;$i<=20;$i++){
	echo "<option value=".$i.">".$i."</option>";
	
}
echo "</select>";
echo " * ".$funit." 個材料包";
echo "<br/>";
echo "<input type='submit' id='submit' value='開始烤囉' disabled/>";
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