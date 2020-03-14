<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$quality_id=$_POST['quality_id'];
echo $quality_id;
echo "??";
$sql="select * from orders where order_id='$quality_id' ";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
  $_SESSION['order_id']=$quality_id;
    header("Location: quality-add.php");
    echo "yes";
	exit;
}else{
  header("Location: quality-search-fail.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
