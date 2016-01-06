<?PHP
require 'config.php';
//金錢-1000,烤爐+1
$id=$_SESSION['id'];
$newmoney= $_SESSION['money']- 1000;
$oven=$_SESSION['oven']+1;
$_SESSION['money']=$newmoney;
$_SESSION=$oven;
$sql="update user set money='$newmoney',oven='$oven' where id='$id';";
mysqli_query($conn,$sql);\
//玩家在oven資料表裡新增一個oven
$sql="insert into oven (uid) value('$id');";
mysqli_query($conn,$sql) or die("MySQL insert message error");
//購買成功訊息
echo "<script>alert('擴充成功');location.href = 'gamepage.php';</script>";

?>

