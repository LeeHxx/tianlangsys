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

$sql="insert into orders(order_id,order_name,order_type,order_volume,order_client,order_start,order_end) values ('$id','$name','$type','$volume','$client','$start','$end')";

$result=mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('添加成功！');window.location.href='order.php';</script>";
    //header("Location: order-add-success.php");
    echo "yes";
	exit;
}else{
  echo "<script>alert('添加失败！请检查订单号是否重复。');window.history.back(-1);</script>";
  //header("Location: order-add-fail.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
