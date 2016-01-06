<?PHP
require 'config.php';
$ovenid=$_POST['ovenid'];
$sql="select *from oven where ovenid=$ovenid";
$result=mysqli_query($conn,$sql);
echo "<table align='center'>";
while($row=mysqli_fetch_array($result)){
	echo "<tr ><td colspan='2'>烤爐詳細資料</td></tr>";
	echo "<tr><td>食物名稱</td><td>".$row['fname']."</td></tr>";
	echo "<tr><td>數量</td><td>".$row['fcount']."</td></tr>";
	echo "<tr><td>結束時間</td><td>".$row['finishtime']."</td></tr>";
}
echo "</table>";
?>