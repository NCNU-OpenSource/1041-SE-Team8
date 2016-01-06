<?PHP
date_default_timezone_set('Asia/Taipei');
	require 'config.php';
	$user=$_SESSION['id'];
	$fid=$_POST['id'];
	$fname=$_POST['fname'];
	$ftime=$_POST['ftime'];
	$funit=$_POST['funit'];
	$count=$_POST['count'];
	$sumtime=$count * $ftime; 
	//印出值:玩家,製作食物ID,食物名稱,時間,食物材料包數,數量,總需要時間
	//echo "玩家:".$user."食物:".$fid."時間:".$ftime."數量:".$count."總需時間:".$sumtime."<br/>";
	//$ovencount:看玩家有幾個空置的烤爐
	$sql="select count(ovenid) as a from oven where uid='$user' and status='0';";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)){
		$ovencount=$row['a'];
	}
	//空置烤爐>0,製作開始
	//空置烤爐=0,停止製作
	if($ovencount>0)
	{
	//當前時間
	$starttime=date("Y-m-d h:i:s");
	//當前時間+製作總時間
	//mktime(h,i,s,m,d,y)
	$finishtime=date("Y-m-d H:i:s",mktime(date("h"),date("i"),date("s")+ $sumtime ,date("m"),date("d"),date("Y")));
	//echo "NOW:".$starttime."<br/>";
	//echo "FIN:".$finishtime;
	//$oven找出第一個空置的烤爐
	$sql="select * from oven where uid='$user' and status='0';";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)){
		$oven=$row['ovenid'];
		break;
	}
	
	//更新$oven的資料,foodname,starttime,finishtime,status
	$sql="update oven set fname='$fname',fcount='$count',starttime='$starttime',finishtime='$finishtime' ,status='1' where ovenid='$oven';";
	mysqli_query($conn,$sql)or die("ERROR");
	//扣玩家的材料包
	$newfoodpackage=$_SESSION['foodpackage'] - $funit * $count;
	//echo "玩家FOODPACKAGE:".$_SESSION['foodpackage']."新的FOODPACKAGE:".$newfoodpackage;
	$_SESSION['foodpackage']=$newfoodpackage;
	$sql="update user set foodpackage='$newfoodpackage' where id='$user';";
	mysqli_query($conn,$sql)or die("ERROR");
	echo "<script>alert('開始製作中....');location.href = 'gamepage.php';</script>";
	}
else {	
	echo "<script>alert('現在沒有空的烤爐');location.href = 'gamepage.php';</script>";
}
?>