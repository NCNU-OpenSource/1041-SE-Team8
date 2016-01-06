<?PHP
require 'config.php';
//金錢-1000,烤爐+1
$id=$_SESSION['id'];
$newmoney= $_SESSION['money']- 1000;
$oven=$_SESSION['oven']+1;
$_SESSION['money']=$newmoney;
$_SESSION['oven']=$oven;
$sql="select * from oven where uid=$id";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
	$uoven=$row['uoven'];
}
$uoven=$uoven+1;
$sql="update user set money='$newmoney',oven='$oven' where id='$id';";
mysqli_query($conn,$sql);
//玩家在oven資料表裡新增一個oven
$sql="insert into oven (uid,uoven) value('$id','$uoven');";
mysqli_query($conn,$sql) or die("MySQL insert message error");
//購買成功訊息
echo "<script>alert('擴充成功');location.href = 'gamepage.php';</script>";

?>

