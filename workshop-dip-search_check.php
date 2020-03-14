<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$dip_id=$_POST['dip_id'];
echo $dip_id;
echo "??";
$sql="select * from orders where order_id='$dip_id' ";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
  $_SESSION['order_id']=$dip_id;
    header("Location: workshop-dip-add.php");
    echo "yes";
	exit;
}else{
  header("Location: workshop-dip-search-fail.php");
  echo "no";
	die('Could not connect:' .mysqli_error());
	exit;
	}

mysqli_close($conn);

?>
