<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$id=$_POST['order_id'];
$addition_date=$_POST['addition_date'];
$type=$_POST['addition_type'];
$volume=$_POST['addition_volume'];
$applicant=$_POST['addition_applicant'];
$reason=$_POST['addition_reason'];
$leader=$_POST['addition_leader'];
$price=$_POST['addition_price'];
$controller=$_POST['addition_controller'];

$sql="insert into addition(order_id,addition_date,addition_type,addition_volume,addition_applicant,addition_reason,addition_leader,addition_price,addition_controller) values
 ('$id','$addition_date','$type','$volume','$applicant','$reason','$leader','$price','$controller')";

$result=mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('提交成功！');window.location.href='workshopaddition-add.php';</script>";
    //header("Location: addition-add-success.php");

	exit;
}else{
  echo "<script>alert('提交失败！请检查填写信息无误。');window.history.back(-1);</script>";
  //header("Location: addition-add.php");
  
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
