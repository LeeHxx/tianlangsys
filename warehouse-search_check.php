<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$w_id=$_POST['w_id'];
echo $w_id;
echo "??";
$sql="select * from orders where order_id='$w_id' ";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
  $_SESSION['order_id']=$m_id;
    header("Location: warehouse-add.php");
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
