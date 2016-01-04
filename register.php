
<?PHP
	require 'config.php';
header('Content-type: text/html; charset=utf-8');
$accountid=mysqli_real_escape_string($conn,$_POST['rid']);
$pwd=mysqli_real_escape_string($conn,$_POST['rpwd']);
$cpwd=mysqli_real_escape_string($conn,$_POST['rcpwd']);
$name=mysqli_real_escape_string($conn,$_POST['rname']);

if($accountid==null||$pwd==null||$name==null){
	?><script>
		window.setTimeout(function() {window.location = 'login.php';}, 3000);
	</script>
<?PHP
echo "輸入錯誤，3秒後返回首頁";
}
else if ($pwd != $cpwd){
	?><script>
		window.setTimeout(function() {window.location = 'login.php';}, 3000);
	</script>
<?PHP
echo "輸入錯誤，3秒後返回首頁";
}
	
else{

	$sql="insert into user(account,password,playername,foodpackage) value('$accountid','$pwd','$name','5');";
	mysqli_query($conn,$sql) or die("MySQL insert message error");
	$sql="select * from user where account='$accountid';";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)){
		$id=$row['id'];
	}
	$sql="insert into oven (uid) value('$id');";
	mysqli_query($conn,$sql) or die("MySQL insert message error");
	$sql="insert into oven (uid) value('$id');";
	mysqli_query($conn,$sql) or die("MySQL insert message error");
	?><script>
		window.setTimeout(function() {window.location = 'login.php';}, 3000);
	</script>
<?PHP
echo "註冊成功，3秒後返回首頁";
}

?>
