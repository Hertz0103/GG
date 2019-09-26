<?php
include("mysql.inc.php");

$sql="SELECT * FROM account ORDER BY code ASC";
$result=mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >0){
  while ($row = mysqli_fetch_array($result)) {
    if($row['account']==$_POST['account']&&
	$row['password']==$_POST['password'])
	{
	mysqli_query($conn,"UPDATE current
	                 SET account = '{$_POST['account']}'
                    WHERE code = '0'");
  header("Location: http://localhost/index.html");
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>登入</title>
  <style> 
  body{
	  background-image:url("darksouls3firelink.gif");
	  background-size:cover;
  }
  </style>
</head>
<body>
  <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
   <p style="margin-left:200px;color:white">帳號:</p>
   <input name="account" style="margin-left:200px;">
   <p style="margin-left:200px;color:white">密碼:</p>
   <input name="password" type="password" style="margin-left:200px;">
    <input name="submit" type="submit" value="登入">
	<p style="margin-left:200px;color:white">操作說明:</p>
	<p style="margin-left:200px;color:white">上下左右:移動</p>
	<p style="margin-left:200px;color:white">z確定</p>
	<p style="margin-left:200px;color:white">x取消\菜單</p>
	<p style="margin-left:200px;color:white">滑鼠觸發事件</p>
  </form>

</body>
</html>