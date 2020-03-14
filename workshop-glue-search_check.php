<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$glue_id=$_POST['glue_id'];

$sql="select * from orders where order_id='$glue_id' ";
$sql0="select * from glue where order_id='$glue_id' ";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

$result0=mysqli_query($conn,$sql0);
$num0=mysqli_num_rows($result0);
if ($num0>0) {
  $_SESSION['order_id']=$glue_id;
    header("Location: workshop-glue-edit.php");
    echo "yes";
	exit;
}elseif($num>0){
  $_SESSION['order_id']=$glue_id;
    header("Location: workshop-glue-add.php");
    echo "yes";
	exit;
}else{
  header("Location: workshop-glue-search-fail.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
