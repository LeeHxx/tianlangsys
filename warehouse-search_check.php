<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$w_id=$_POST['w_id'];

$sql="select * from orders where order_id='$w_id' ";
$sql0="select * from material where order_id='$w_id' ";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

$result0=mysqli_query($conn,$sql0);
$num0=mysqli_num_rows($result0);
if ($num0>0) {
    $_SESSION['order_id']=$w_id;
    header("Location: warehouse-add.php");
    echo "yes";
	exit;
}elseif($num>0){
    $_SESSION['order_id']=$w_id;
    echo "<script>alert('警告！此订单物料信息未填写，系统测试阶段允许继续操作。');window.location.href='warehouse-add.php';</script>";
    //header("Location: warehouse-add.php");
    echo "yes";
	exit;
}else{
  header("Location: warehouse-search-fail.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
