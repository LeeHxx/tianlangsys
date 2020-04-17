<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
date_default_timezone_set('Asia/Shanghai');
$time_now=strtotime(date("Y-m-d"));
$tt = date("Y-m-d H:i:s");
echo $tt;
$sql="select * from orders where order_finished=0";
$result=mysqli_query($conn,$sql);
$loginNum=mysqli_num_rows($result);
for($i=0; $i<$loginNum; $i++){
  $row = mysqli_fetch_assoc($result);
  $time_end = strtotime($row['order_end']);
  $time_left =ceil(($time_end-$time_now)/86400);
  // echo $row['order_id'];
  // echo $row['order_end'];
  echo $time_left;
}
mysqli_close($conn);
?>
