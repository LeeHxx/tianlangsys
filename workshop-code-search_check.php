<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$code_id=$_POST['code_id'];

$sql="select * from orders where order_id='$code_id' ";
$sql0="select * from warehouse where order_id='$code_id' ";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

$result0=mysqli_query($conn,$sql0);
$num0=mysqli_num_rows($result0);
if ($num0>0) {
  $_SESSION['order_id']=$code_id;
    header("Location: workshop-code-add.php");
    // echo "yes";
	exit;
}elseif($num>0){
  $_SESSION['order_id']=$code_id;
  echo "<script>alert('警告！此订单物料未入库。系统测试阶段允许继续操作');window.location.href='workshop-code-add.php';</script>";
    // header("Location: workshop-code-add.php");
    // echo "yes";
	exit;
}else{
  header("Location: workshop-code-search-fail.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
