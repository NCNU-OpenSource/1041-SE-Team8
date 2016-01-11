<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<!--<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" media="screen">-->
<script>
function check() {
        text1 = document.getElementById("pwd");
        text2 = document.getElementById("compwd");
		
		if (text1.value == null) {
			document.getElementById("msg1").innerText = "";
        }
		else if (text1.value != text2.value) {
            document.getElementById("msg1").innerText = "密碼不一致";
        }
		else{
			document.getElementById("msg1").innerText = "";
		}
}

</script>
<style>
body{
	background-size:cover;
	background-repeat:no-repeat;
}
#a{
	position:relative;
	float:left;
	margin :5%;
	top:37%;
	left:10%;
	padding:10px;
	background-color: #b300b1;
	border: 2px solid;
    border-radius: 25px;
}
#b{
	position:relative;
	left:45%;
	top: 15%;
	width:20%;
	height:18%;
	float:left;
	background-color:#33ccff;
	padding:100px 4px 100px 10px;
	border: 2px solid;
    border-radius: 25px;
}
#text{
	position:relative;
	top:30%;
	left:10%;
	font-size:70px;
	color:white;
}
</style>
<?PHP
session_start();
$host = 'localhost';
$user = 'myid';
$pass = '12345';
$db = 'happykitchen';
$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); //選擇編碼
//mysql_select_db($db, $conn); //選擇資料庫

$_SESSION['uID'] = "";
if (isset($_POST['id']))
	$userName = $_POST['id'];
else
	$userName="";

if (isset($_POST['pwd']))
	$passWord = $_POST['pwd'];
else
	$passWord="";

		$sql = "SELECT * FROM user WHERE account='" . $userName . "' AND password= '" . $passWord . "'";
		if ($result = mysqli_query($conn,$sql)) {
			if ($row=mysqli_fetch_array($result)) {
				if($row['playername'] == null){
					header("Location:playername.php");
				}
				else
				{
					$_SESSION['id'] = $row['id'];
					header("Location:gamepage.php");
					exit(0);
				}
			} 
		}
		

?>
</head>
<body  background="icon/body1.jpg">
<div  id="text">
<span>HAPPY</span>
<span>KITCHEN</span>
</div>
<div id="a">
<h1>登入</h1>
<form class="form" method="post" action="index.php">
帳號:<input type="text" name="id" ><br />
密碼:<input type="password" name="pwd"><br />
<input type="submit" class="btn btn-warning" value="登入">
</form>
</div>
<div id="b">
<h1>註冊帳號</h1>
<form class="form" method="post" action="register.php">
帳號:<input type="text" name="rid" ></span><br />
密碼 :<input type="password" id="pwd" name="rpwd" ></span><br />
確認密碼 : <input type="password" id="compwd"  name="rcpwd" onchange="check()"><span id="msg1"></span><br />
匿稱 :<input type="text" id="name" name="rname"><span id="msg4"></span><br />
<input type="submit" value="註冊">
</form>
</div>

</body>
</html>