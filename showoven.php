

<html>
</html>
<head>

<script   type="text/javascript">
function startset(id,fint,status){
var a=fint;
var b=1;
//var dv="oven"+id;
	if(status==0){
		document.getElementById(id.id).value="空置中..."
	}
	else{
		gostart(id,a);
	}
}
function gostart(id,a){

	if(a<0){
		document.getElementById(id.id).value= "完成囉" ;
	}
	else{
	document.getElementById(id.id).value= a ;
	a=a-10;
	setTimeout('gostart(' + id.id + ',' + a + ');',100);
	}
	
}
function clickfunction(ovenid,uoven){
	var v=document.getElementById(uoven.id).value;
	if(v=="空置中..."){
		document.getElementById(uoven.id).disabled=true;
	}
	else if(v=="完成囉"){
		$("#div010").fadeIn("slow");
		DIV="div011";
		$.ajax({
		url: 'ovendone.php',
		datatype:'html',
		type:'POST',
		data: { ovenid: ovenid},
		error:function(xhr){
			$('#'+DIV).html(xhr);
		},
		success: function(response) {
			$('#'+DIV).html(response); 
		}
		});
	}
	else{
		//$('#div000').show();
		$("#div010").fadeIn("slow");
		DIV="div011";
		$.ajax({
		url: 'showdetail.php',
		datatype:'html',
		type:'POST',
		data: { ovenid: ovenid},
		error:function(xhr){
			$('#'+DIV).html(xhr);
		},
		success: function(response) {
			$('#'+DIV).html(response); 
		}
		});

	}
}

</script>
</head>
<body>

<?PHP 
require 'config.php';
date_default_timezone_set('Asia/Taipei');
$id=$_SESSION['id'];
$sql="select * from oven where uid=$id";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
	/*echo date("H:i:s",time())."...";
	echo date("H:i:s",strtotime($row['finishtime']))."...";
	$a= date("H:i:s",time())."...";
	$b=date("H:i:s",strtotime($row['finishtime']));*/
	//當前時間(時:分:秒)
	$a=date("h:i:s",time());
	//完成時間(時:分:秒)
	$b=$row['finishtime'];
	
	$c=strtotime($a) .":::";
	$d=strtotime($b).":::";
	//echo "a".$a."/b".$b."\n";
	//echo "c".$c."/d".$d."\n";
	$time=$d-$c;
	//echo $d-$c;
	//echo "<input type='button' id='oven".$row['uoven']."' value='烤爐".$row['uoven']."' onclick='startset(oven".$row['uoven'].",".$time.");' style='height:300px;width:300px;margin:8% 8%;'>";
	$ovenid=$row['ovenid'];
	$uoven=$row['uoven'];
	$status=$row['status'];
	echo "<input type='button' id='oven".$uoven."' onclick='clickfunction(".$ovenid.",oven".$row['uoven'].")'style='height:300px;width:300px;margin:8% 8%;font-size:40px'>";
	echo "<script>startset(oven".$row['uoven'].",".$time.",".$status.");</script>";
	}

?>

<div id="div010" style="width:250px;height:150px;background-color:red;position:absolute;top:35%;left:40%;display:none;" >
<input type="button"  onclick="closestat(this,'div010')" value="X"style="position:relative; top:40%;left:90%;" >
<div id="div011">
</div>
</div>
</body>
</html>