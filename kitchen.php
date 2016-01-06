<html>
<head>
</head>
<body>
</body>
<?PHP

require 'config.php';
$id =$_SESSION['id'];
$sql="select *from kitchen where user_id=$id;";//<----取得玩家背包物品
$result=mysqli_query($conn,$sql);
$food_money[]=0;
$count=0;
while ($rs=mysqli_fetch_array($result)) {
	$sql_food="select *from food ;";//<----取得食物資訊
	$result_food=mysqli_query($conn,$sql_food);
	while ($rs_food=mysqli_fetch_array($result_food)){
		//比對food和kitchen的名稱後儲存單價
		if ($rs['food_id']==$rs_food['fname']){ 
			$food_money[$count]=$rs_food['money'] ;
		}
	}
	$count++;
}
?>

<!--計算金額-->
<script>
function check(){
	var item=document.getElementById("count").value;
	var money=item*<?PHP $food_money["0"]?>;
	alert("金額為 " +money);
	document.getElementById("money").value=money;
}
</script>

<!--列出背包東西-->
<!--<form action="kitchensend.php" method="POST">-->
<table style="width:95%;height:30%; margin:0 auto; text-align: center;" border="2">
<tr>
    <td>麵包總類</td>
	<td>數量</td>
	<td>販賣</td>
	<td>單價</td>
	<td>總價</td>
</tr>
<tr>
    <?php
	$count_t=0;
	$sql="select *from kitchen where user_id=$id;";//<----取得玩家背包物品
	$result=mysqli_query($conn,$sql);
	while ($rs=mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" , $rs['food_id'] ,"</td>
			  <td>" , $rs['amount'],"</td>";
		echo "<td>" ;
		echo "數量 &nbsp;&nbsp;
		<select class='count' name='count' id='count' >";
		for($i=0;$i<=20;$i++){
			echo "<option value=".$i.">".$i."</option>";
		}
		echo "<input type='submit' value='結帳' id='submit' onclick='check();'>";
		echo "</select>";
		echo "</td>";
		echo "<td>",$food_money[$count_t],"</td>";
		echo "<td>" , "<input type='text' id='money' name='id' >" ,"</td>";
		echo "</tr>";
		$count_t++;
	}
	?>
</tr>
<!--</form>-->

</table>
</html>