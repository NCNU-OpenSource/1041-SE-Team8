<?PHP
require 'config.php';
$id=$_SESSION['id'];
$ovenid=$_POST['ovenid'];
$fn=$_POST['fn'];
$fc=$_POST['fc'];
$sql="update oven set fname='',fcount='0',starttime='00:00:00',finishtime='00:00:00',status='0' where ovenid=$ovenid ;";
mysqli_query($conn,$sql)or dir ("ERROE");
$sql="select * from food where fname='$fn'";
$result=(mysqli_query($conn,$sql));
while($row=mysqli_fetch_array($result)){
	$exp=$row['exp'];
}
$upexp=$exp * $fc;
//echo $_SESSION['id'].$ovenid.$fn.$fc.$exp;
$sql="update user set exp = exp + $upexp where id=".$_SESSION['id'].";";
mysqli_query($conn,$sql)or die ("ERROR1");
//$sql="insert into kitchen (user_id,food_id,amount) values ('".$_SESSION['id']."','$fn','$fc') on duplicate key update amount = amount + $fc ";
$sql="select count(*) as a from kitchen where user_id='".$_SESSION['id']."' and food_id = '$fn'";
$result=mysqli_query($conn,$sql)or die ("ERROR2");
while($row=mysqli_fetch_array($result)){
	$ioru= $row['a'];
}
//echo $ioru;
if($ioru ==0){
	
	$sql = "INSERT INTO kitchen (user_id,food_id,amount) values ( '$id' , '$fn' , '$fc' )";
}
else {
	$sql = "update kitchen set amount = amount + $fc where user_id = '$id' and food_id = '$fn';";
	
}
mysqli_query($conn,$sql)or die ("ERROR3");
echo "<script>alert('經驗增加$upexp');location.href = 'gamepage.php';</script>";

?>