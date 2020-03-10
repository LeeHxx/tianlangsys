<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$smt_id=$_POST['smt_id'];

$sql="select * from orders where order_id='$smt_id' ";
$sql0="select * from smt where order_id='$smt_id' ";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

$result0=mysqli_query($conn,$sql0);
$num0=mysqli_num_rows($result0);
if ($num0>0) {
  $_SESSION['order_id']=$smt_id;
    header("Location: workshop-smt-edit.php");
    echo "yes";
	exit;
}elseif($num>0){
  $_SESSION['order_id']=$smt_id;
    header("Location: workshop-smt-add.php");
    echo "yes";
	exit;
}else{
  header("Location: workshop-smt-search-fail.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
