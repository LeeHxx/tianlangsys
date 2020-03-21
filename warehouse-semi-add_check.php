<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$income=$_POST['semi_income'];
$place=$_POST['semi_place'];
$receive=$_POST['semi_receive'];

$sql="insert into semi(order_id,semi_income,semi_place,semi_receive) values ('$id','$income','$place','$receive')";

$result=mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('添加成功！');window.location.href='warehouse-semi-add-success.php';</script>";
    //header("Location: warehouse-semi-add-success.php");
    echo "yes";
	exit;
}else{
  echo "<script>alert('添加失败！请检查填写信息无误。');window.history.back(-1);</script>";
  //header("Location: warehouse-semi-add.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
