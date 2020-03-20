<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$name=$_POST['order_name'];
$type=$_POST['order_type'];
$volume=$_POST['order_volume'];
$client=$_POST['order_client'];
$start=$_POST['order_start'];
$end=$_POST['order_end'];

$sql="UPDATE orders set order_name='$name',order_type='$type',order_volume='$volume',order_client='$client',order_start='$start',order_end='$end' WHERE order_id='$id'";

$result=mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('修改成功！');window.location.href='order.php';</script>";
    //header("Location: order-add-success.php");
    echo "yes";
	exit;
}else{
  echo "<script>alert('修改失败！请重新检查所填写信息。');window.history.back(-1);</script>";
  //header("Location: order-add-fail.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
