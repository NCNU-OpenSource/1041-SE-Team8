<?php
session_start();
$host = 'localhost';
$user = 'myid';
$pass = '12345';
$db = 'happykitchen';
$conn = mysqli_connect($host, $user, $pass,$db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); 

if(!isset($_SESSION["id"]))
	header("Location:index.php");
if($_SESSION["id"]=="")
	header("Location:index.php");


?>