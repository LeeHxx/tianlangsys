<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$addition_id=$_POST['addition_id'];
echo $addition_id;
echo "??";
$sql="select * from orders where order_id='$addition_id' ";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
  $_SESSION['order_id']=$addition_id;
    header("Location:addition-add.php");
    echo "yes";
	exit;
}else{
  header("Location: addition-search-fail.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
