<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" media="screen">
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
					$_SESSION['playername'] = $row['playername'];
					header("Location:gamepage.php");
					exit(0);
				}
			} 
		}
111
?>
</head>
<body>
<div class="wrapper"><div class="container">
<form class="form" method="post" action="login.php">
帳號: &nbsp &nbsp &nbsp <input type="text" name="id" ><br />
密碼 : &nbsp &nbsp<input type="password" name="pwd"><br />
<input type="submit" class="btn btn-warning">
</div></div>
</body>
</html>