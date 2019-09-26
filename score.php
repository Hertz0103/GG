<?php
include("mysql.inc.php");

//如果以 GET 方式傳遞過來的 score 參數不是空字串
if (!empty($_GET['score'])){
//確認現在帳號
  $sql="SELECT account FROM current WHERE code = '0' ";
  $result=mysqli_query($conn, $sql);
  //將查詢到的資料放在 $row 陣列
  $row=mysqli_fetch_array($result);
}
mysqli_query($conn,"INSERT score (score,account)
                    VALUES ('{$_GET['score']}','{$row['account']}')");
mysqli_query($conn,"UPDATE score SET score='{$_GET['score']}' WHERE account='{$row['account']}' AND score<'{$_GET['score']}'");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>排名</title>
</head>
<body>
<?php

//使用score排序, 查詢 score 資料表的所有資料
$sql="SELECT * FROM score ORDER BY score DESC";
$result=mysqli_query($conn, $sql);

//如果查到的記錄筆數大於 0, 便使用迴圈顯示所有資料
if (mysqli_num_rows($result) >0){
  echo "<hr><table border='1'>
        <tr><th>帳號</th><th>分數</th></tr>";

  while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>{$row['account']}</td>
              <td>{$row['score']}</td></tr>";
  }
  echo '</table>';
}
?>
</body>
</html>