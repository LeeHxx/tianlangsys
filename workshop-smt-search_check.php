<?php
session_start();
header("Content-type:text/html; charset=utf-8");
require_once('conn.php');
$smt_id=$_POST['smt_id'];
echo $smt_id;
echo "??";
$sql="select * from orders where order_id='$smt_id' ";

$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
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