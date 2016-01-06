
<?PHP
	require 'config.php';
header('Content-type: text/html; charset=utf-8');
$accountid=mysqli_real_escape_string($conn,$_POST['rid']);
$pwd=mysqli_real_escape_string($conn,$_POST['rpwd']);
$cpwd=mysqli_real_escape_string($conn,$_POST['rcpwd']);
$name=mysqli_real_escape_string($conn,$_POST['rname']);

if($accountid==null||$pwd==null||$name==null){
echo "<script>alert('輸入錯誤');location.href = 'index.php';</script>";
}
else if ($pwd != $cpwd){
echo "<script>alert('輸入錯誤');location.href = 'index.php';</script>";
}
	
else{

	$sql="insert into user(account,password,playername,foodpackage) value('$accountid','$pwd','$name','5');";
	mysqli_query($conn,$sql) or die("MySQL insert message error");
	$sql="select * from user where account='$accountid';";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)){
		$id=$row['id'];
	}
	$sql="insert into oven (uid,uoven) value('$id','1');";
	mysqli_query($conn,$sql) or die("MySQL insert message error");
	$sql="insert into oven (uid,uoven) value('$id','2');";
	mysqli_query($conn,$sql) or die("MySQL insert message error");
	echo "<script>alert('註冊成功');location.href = 'index.php';</script>";
}
	?>
