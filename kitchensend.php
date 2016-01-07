<?PHP
require "config.php";
$uid=$_POST['uid'];
$food_id=$_POST['foodid'];
$count=$_POST['count'];
$money=$_POST['money'];
$summoney=$count * $money;
$sql="update user set  money = money + $summoney where id=$uid";

mysqli_query($conn,$sql)or die ("ERROR");
$sql ="update kitchen set amount = amount - $count where user_id = '$uid' and food_id = '$food_id' ";
mysqli_query($conn,$sql)or die ("ERROR2");
echo "<script>alert('成功賣出".$count."個".$food_id."，總價:".$summoney."');location.href = 'gamepage.php';</script>";
?>