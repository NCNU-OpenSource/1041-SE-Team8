
<?PHP

require 'config.php';
$id=$_POST['id'];
$count=$_POST['count'];
$money=$_SESSION['money'];
$sql="select * from shop where id='1';";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
	$foodpack=$row['price'];
}
$total=$count*$foodpack;
$newmoney= $money- $total;
$foodpackage=$_SESSION['foodpackage']+$count;
$fp=$foodpackage+ $count;
$_SESSION['money']=$newmoney;
//echo "購買數量".$count."總計".$total."新玩家金錢".$newmoney;
$sql="update user set money='$newmoney',foodpackage='$foodpackage' where id='$id';";
mysqli_query($conn,$sql);


//購買成功訊息
echo "<script>alert('購買成功');location.href = 'gamepage.php';</script>";

?>





