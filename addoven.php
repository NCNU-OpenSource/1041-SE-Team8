<?PHP
require 'config.php';
$id=$_SESSION['id'];
$newmoney= $_SESSION['money']- 1000;
$oven=$_SESSION['oven']+1;
$_SESSION['money']=$newmoney;
$_SESSION=$oven;
//echo "購買數量".$count."總計".$total."新玩家金錢".$newmoney;
$sql="update user set money='$newmoney',oven='$oven' where id='$id';";
mysqli_query($conn,$sql);
$sql="insert into oven (uid) value('$id');";
mysqli_query($conn,$sql) or die("MySQL insert message error");
//購買成功技巧
echo "<script>alert('擴充成功');location.href = 'gamepage.php';</script>";

?>

