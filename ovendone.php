
</script>
<?PHP
require 'config.php';
$ovenid=$_POST['ovenid'];

$sql="select *from oven where ovenid=$ovenid";
$result=mysqli_query($conn,$sql);
echo "<table align='center' border='2'>";
while($row=mysqli_fetch_array($result)){
	echo "<tr ><td colspan='2' align='center'>烤爐詳細資料</td></tr>";
	echo "<tr><td>食物名稱</td><td>".$row['fname']."</td></tr>";
	echo "<tr><td>數量</td><td>".$row['fcount']."</td></tr>";
	echo "<tr><td>結束時間</td><td>".$row['finishtime']."</td></tr>";
	$fn=$row['fname'];
	$fc=$row['fcount'];
}
echo "<tr><td colspan='2' align='center'>";
echo "<form action='ovenfindone.php' method='POST'>";
echo "<input type='text' name='ovenid' value='$ovenid' hidden>";
echo "<input type='text' name='fn' value='$fn' hidden>";
echo "<input type='text' name='fc' value='$fc' hidden>";
echo "<input type='submit' value ='收入廚房'>";

echo "</td></tr>";
echo "</form>";

echo "</table>";


?>