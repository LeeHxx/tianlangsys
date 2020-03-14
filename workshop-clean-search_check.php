<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$clean_id=$_POST['clean_id'];
echo $clean_id;
echo "??";
$sql="select * from orders where order_id='$clean_id' ";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
  $_SESSION['order_id']=$clean_id;
    header("Location: workshop-clean-add.php");
    echo "yes";
	exit;
}else{
  header("Location: workshop-clean-search-fail.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
