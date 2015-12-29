
<?php
require 'config.php';
$id =$_REQUEST['id'];
$sql="select * from food where id=$id";//<----讀取食譜詳細材料
$result= mysqli_query($conn,$sql);
$text="";
while($row=mysqli_fetch_array($result)){
	$id=$row['id'];
	$text=$row['foodpackage'];
}
echo "需要的材料包".$text."個<br/>";
echo "<form action='stated.php' method='POST' >";
echo "<input type='text'  name='id' value='".$id."' hidden/>";
echo "數量<select class='count' name='count' id='count'>";
for($i=1;$i<=20;$i++){
	echo "<option value=".$i.">".$i."</option>";
	
}
echo "</select>";
echo "<br/>";
echo "<input type='submit'/>";
echo "</form>";

?>
