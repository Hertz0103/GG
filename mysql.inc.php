<?php
//資料庫設定
$dbServer = "localhost";
$dbUser = "root";
$dbName = "game";

//連線資料庫伺服器
$conn = @mysqli_connect($dbServer, $dbUser,"", $dbName);

if (mysqli_connect_errno($conn))
  die("無法連線資料庫伺服器");

//設定連線的字元集為 UTF8 編碼
mysqli_set_charset($conn, "utf8");
?>