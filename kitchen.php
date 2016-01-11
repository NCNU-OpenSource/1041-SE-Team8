<html>
<head>
<style>
#tablecss{

}
</style>
<script>
function saleclick(num){
	document.getElementById("sb"+num).hidden=false;
	document.getElementById("ss"+num).hidden=false;
	
}

</script>
<style>
kitchentable td{
	border-bottom:1px solid black;
	border-left:0px;
	border-right:0px;
}
</style>
</head>
<body>

<?PHP

require 'config.php';
$id =$_SESSION['id'];
/*$sql="select *from kitchen where user_id=$id;";//<----取得玩家背包物品
$result=mysqli_query($conn,$sql);
$food_money[]=0;
$count=0;
while ($rs=mysqli_fetch_array($result)) {
	$sql_food="select * from food ;";//<----取得食物資訊
	$result_food=mysqli_query($conn,$sql_food);
	while ($rs_food=mysqli_fetch_array($result_food)){
		//比對food和kitchen的名稱後儲存單價
		if ($rs['food_id']==$rs_food['fname']){ 
			$food_money[$count]=$rs_food['money'] ;
		}
	}
	$food_money[$count]=$count;
	$count++;
}*/
/*$count=0;
$sql="select *from food,kitchen where user_id=$id and food.fname=kitchen.food_id";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
	$food_money[$count]=$row['money'] ;
		$count++;
}*/
?>

<!--計算金額-->
<script>
/*function check(){
	var item=document.getElementById("count").value;
	var money=item*<?PHP echo $food_money["0"]?>;
	alert("金額為 " +money);
	document.getElementById("money").value=money;
}*/
</script>

<!--列出背包東西-->
<div id="tablecss">
<table style="width:95%;margin:0 auto; text-align: center;" CLASS="table"  id="kitchentable"border="5">
<tr class='success'>
    <td>麵包名稱 </td>
	 <td>單價 </td>
	 <td>販賣</td>

</tr>

    <?php
	$num=0;
	$sql="select *from food,kitchen where user_id=$id and food.fname=kitchen.food_id and amount<>'0'";//<----取得玩家背包物品
	$result=mysqli_query($conn,$sql);
	while ($rs=mysqli_fetch_array($result)) {
		
		
		echo "<tr class='danger'>";
		echo "<td><img src='icon/bread/bread$num.png'><span class='label label-success label-as-badge'style=' border-radius: 1em;'>".$rs['amount']."</span></td>";
		echo "<td> <span class='label label-pill label-warning'>$</span>".$rs['money']."</td>";
		echo "<td><form action='kitchensend.php' method='POST'>";
		echo "<input type='text' name='uid' value='".$_SESSION['id']."'hidden>";
		echo "<input type='text' name='foodid' value='".$rs['food_id']."'hidden>";
		echo "<input type='text' name='money' value='".$rs['money']."'hidden>";
		echo "<h2><a class='label label-pill label-danger' id='sale' onclick='saleclick($num)'>SALE</a></h2>";
		echo "<select class='count' name='count' id='ss$num' hidden>";
		for($i=$rs['amount'];$i>=0;$i--){
			echo "<option value=".$i.">".$i."</option>";
		}
		echo "</select><br/>";
		
		echo "<input type='submit' value='賣出' id='sb$num' hidden>";
		echo "</form></td>";
		
		echo "</tr>";

		$num++;
	}
	?>

</table>
</div>
</body>
</html>